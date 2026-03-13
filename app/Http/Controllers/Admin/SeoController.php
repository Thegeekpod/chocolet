<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        $seos = SeoSetting::latest()->get();
        return view('admin.seo.index', compact('seos'));
    }

    public function create()
    {
        return view('admin.seo.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_url' => 'required|string|unique:seo_settings,page_url',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'other_scripts' => 'nullable|string',
        ]);

        SeoSetting::create($validated);

        return redirect()->route('admin.seo.index')->with('success', 'SEO setting created successfully.');
    }

    public function edit(SeoSetting $seo)
    {
        return view('admin.seo.edit', compact('seo'));
    }

    public function update(Request $request, SeoSetting $seo)
    {
        $validated = $request->validate([
            'page_url' => 'required|string|unique:seo_settings,page_url,' . $seo->id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'other_scripts' => 'nullable|string',
        ]);

        $seo->update($validated);

        return redirect()->route('admin.seo.index')->with('success', 'SEO setting updated successfully.');
    }

    public function destroy(SeoSetting $seo)
    {
        $seo->delete();
        return redirect()->route('admin.seo.index')->with('success', 'SEO setting deleted successfully.');
    }
}
