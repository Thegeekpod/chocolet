<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'footer_logo' => 'nullable|image',
            'footer_text' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'facebook_url' => 'nullable|string',
            'instagram_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'linkedin_url' => 'nullable|string',
            'youtube_url' => 'nullable|string',
            'hero_subheading' => 'nullable|string',
            'hero_title' => 'nullable|string',
            'hero_description' => 'nullable|string',
            'about_label' => 'nullable|string',
            'about_title' => 'nullable|string',
            'about_description_1' => 'nullable|string',
            'about_description_2' => 'nullable|string',
            'about_image' => 'nullable|image',
            'about_years' => 'nullable|string',
            'about_countries' => 'nullable|string',
            'stat_1_val' => 'nullable|string',
            'stat_1_text' => 'nullable|string',
            'stat_2_val' => 'nullable|string',
            'stat_2_text' => 'nullable|string',
            'stat_3_val' => 'nullable|string',
            'stat_3_text' => 'nullable|string',
            'featured_products_title' => 'nullable|string',
            'why_title' => 'nullable|string',
        ]);

        // 1. Static Files
        if ($request->hasFile('logo')) {
            if ($setting->logo) Storage::disk('public')->delete($setting->logo);
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        }
        if ($request->hasFile('footer_logo')) {
            if ($setting->footer_logo) Storage::disk('public')->delete($setting->footer_logo);
            $validated['footer_logo'] = $request->file('footer_logo')->store('settings', 'public');
        }
        if ($request->hasFile('about_image')) {
            if ($setting->about_image) Storage::disk('public')->delete($setting->about_image);
            $validated['about_image'] = $request->file('about_image')->store('home', 'public');
        }

        // 2. Hero Slides
        $heroSlides = [];
        if ($request->has('hero_slides')) {
            foreach ($request->hero_slides as $i => $slide) {
                $bg = $slide['bg'] ?? '';
                $prod = $slide['prod'] ?? '';

                if ($request->hasFile("hero_slides_files.$i.bg")) {
                    $bg = $request->file("hero_slides_files.$i.bg")->store('home', 'public');
                }
                if ($request->hasFile("hero_slides_files.$i.prod")) {
                    $prod = $request->file("hero_slides_files.$i.prod")->store('home', 'public');
                }
                $heroSlides[] = ['bg' => $bg, 'prod' => $prod];
            }
        }
        $validated['hero_slides'] = $heroSlides;

        // 3. Featured Products
        $featuredItems = [];
        if ($request->has('feat')) {
            foreach ($request->feat as $i => $item) {
                $bg = $item['bg'] ?? '';
                $logo = $item['logo'] ?? '';
                $prod = $item['prod'] ?? '';

                if ($request->hasFile("feat_files.$i.bg")) $bg = $request->file("feat_files.$i.bg")->store('home', 'public');
                if ($request->hasFile("feat_files.$i.logo")) $logo = $request->file("feat_files.$i.logo")->store('home', 'public');
                if ($request->hasFile("feat_files.$i.prod")) $prod = $request->file("feat_files.$i.prod")->store('home', 'public');

                $featuredItems[] = ['bg' => $bg, 'logo' => $logo, 'prod' => $prod];
            }
        }
        $validated['featured_products_json'] = $featuredItems;

        // 4. Brands
        $brandsData = [];
        if ($request->has('brands')) {
            foreach ($request->brands as $i => $brand) {
                $slug = \Illuminate\Support\Str::slug($brand['title'] ?? 'brand') ?: 'category-' . $i;
                $mainImg = $brand['main_img'] ?? '';
                $logos = [];

                if ($request->hasFile("brand_main_files.$i")) {
                    $mainImg = $request->file("brand_main_files.$i")->store('home', 'public');
                }

                if (isset($brand['logos'])) {
                    foreach ($brand['logos'] as $l => $existingLogo) {
                        $logoPath = $existingLogo;
                        if ($request->hasFile("brand_logos_files.$i.$l")) {
                            $logoPath = $request->file("brand_logos_files.$i.$l")->store('home', 'public');
                        }
                        $logos[] = $logoPath;
                    }
                }
                // Check if new logos were added in empty slots
                if ($request->hasFile("brand_logos_files.$i")) {
                    foreach ($request->file("brand_logos_files.$i") as $l => $file) {
                        if (!isset($logos[$l]) || !$logos[$l]) {
                            $logos[$l] = $file->store('home', 'public');
                        }
                    }
                }

                $brandsData[$slug] = [
                    'title' => $brand['title'] ?? '',
                    'desc' => $brand['desc'] ?? '',
                    'link' => $brand['link'] ?? '/products',
                    'main_img' => $mainImg,
                    'logos' => array_filter($logos)
                ];
            }
        }
        $validated['brands_data'] = $brandsData;

        // 5. Why Choose Us
        $whyFeatures = [];
        if ($request->has('why')) {
            foreach ($request->why as $i => $feature) {
                $whyFeatures[] = [
                    'icon' => $feature['icon'] ?? '',
                    'title' => $feature['title'] ?? '',
                    'desc' => $feature['desc'] ?? '',
                ];
            }
        }
        $validated['why_features'] = $whyFeatures;

        $setting->update($validated);

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
