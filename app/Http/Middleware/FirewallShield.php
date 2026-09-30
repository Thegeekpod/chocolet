<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FirewallShield
{
    /**
     * Common attack patterns to block immediately.
     */
    protected array $blocklist = [
        // RCE & Code Execution
        'eval\(',
        'base64_decode',
        'gzinflate',
        'passthru\(',
        'shell_exec\(',
        'system\(',
        'exec\(',
        'proc_open',
        'popen\(',
        // Path Traversal
        '\.\./\.\.',
        '\.\.\\\\',
        '/etc/passwd',
        'boot\.ini',
        'win\.ini',
        // Webshell & Known exploit files in query
        '\b(alfa|wso|c99|r57|b374k|filesman|webshell)\b',
        // SQL Injection indicators in GET queries
        'union(\s+all)?\s+select',
        'select\s+.*\s+from\s+information_schema',
        'benchmark\(\s*\d+',
        'waitfor\s+delay',
        // XSS script tags in query
        '<script.*?>',
        'javascript:\s*void',
        'onload\s*=',
        'onerror\s*=',
    ];

    /**
     * Common malicious path scans that should instantly return 403 Forbidden.
     */
    protected array $blockedPaths = [
        '.env',
        '.git',
        '.svn',
        '.htaccess',
        '.aws',
        '.ssh',
        'wp-login.php',
        'wp-admin',
        'xmlrpc.php',
        'phpinfo.php',
        'info.php',
        'shell.php',
        'alfa.php',
        'wso.php',
        'c99.php',
        'cmd.php',
        'adminer.php',
        'dump.sql',
        'backup.sql',
        'database.sql',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $uri = strtolower($request->getRequestUri());

        // 1. Block common malware / probe scans targeting sensitive files
        foreach ($this->blockedPaths as $blockedPath) {
            if (str_contains($uri, $blockedPath)) {
                abort(403, 'Access denied.');
            }
        }

        // 2. Inspect query parameters for malicious payloads
        $queryString = rawurldecode($request->getQueryString() ?? '');
        if ($queryString) {
            foreach ($this->blocklist as $pattern) {
                if (preg_match('/' . $pattern . '/i', $queryString)) {
                    abort(403, 'Forbidden request.');
                }
            }
        }

        // 3. Block malicious path traversal in path info
        $pathInfo = rawurldecode($request->getPathInfo());
        if (str_contains($pathInfo, '..') || str_contains($pathInfo, '//')) {
            // Clean consecutive slashes or abort on directory traversal
            if (str_contains($pathInfo, '..')) {
                abort(403, 'Path traversal attempt blocked.');
            }
        }

        return $next($request);
    }
}
