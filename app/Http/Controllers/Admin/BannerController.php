<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Support\ImageUploader;
use Illuminate\Routing\Controllers\HasMiddleware;

class BannerController extends Controller implements HasMiddleware
{
    use AuthorizesResource;

    private const MODEL = Banner::class;

    private const PARAM = 'banner';

    public function index()
    {
        return view('admin.banners.index', ['banners' => Banner::latest('id')->get()]);
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(BannerRequest $request)
    {
        $data = $request->safe()->except('image');
        $data['is_active'] = $request->boolean('is_active');
        $data['image'] = ImageUploader::replace($request->file('image'), 'banners');
        Banner::create($data);

        return redirect()->route('admin.banners.index')->with('success', 'Bannière créée.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(BannerRequest $request, Banner $banner)
    {
        $data = $request->safe()->except('image');
        $data['is_active'] = $request->boolean('is_active');
        if ($request->hasFile('image')) {
            $data['image'] = ImageUploader::replace($request->file('image'), 'banners', $banner->image);
        }
        $banner->update($data);

        return redirect()->route('admin.banners.index')->with('success', 'Bannière mise à jour.');
    }

    public function destroy(Banner $banner)
    {
        ImageUploader::delete($banner->image);
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Bannière supprimée.');
    }
}
