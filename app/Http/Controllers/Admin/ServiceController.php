<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use App\Support\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Validation\Rule;

class ServiceController extends Controller implements HasMiddleware
{
    use AuthorizesResource;

    private const MODEL = Service::class;

    private const PARAM = 'service';

    public function index()
    {
        return view('admin.services.index', ['services' => Service::orderBy('position')->orderBy('id')->get()]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(ServiceRequest $request)
    {
        $data = $this->data($request);
        $data['slug'] = Service::uniqueSlug($data['slug'] ?? $data['title']);
        if ($request->hasFile('image')) {
            $data['image'] = ImageUploader::replace($request->file('image'), 'services');
        }
        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service créé.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $data = $this->data($request);
        $data['slug'] = $data['slug'] ?? $service->slug;
        if ($request->hasFile('image')) {
            $data['image'] = ImageUploader::replace($request->file('image'), 'services', $service->image);
        } elseif ($request->boolean('remove_image')) {
            ImageUploader::delete($service->image);
            $data['image'] = null;
        }
        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service mis à jour.');
    }

    public function destroy(Service $service)
    {
        ImageUploader::delete($service->image);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service supprimé.');
    }

    public function status(Request $request, Service $service)
    {
        $this->authorize('update', $service);
        $request->validate(['status' => ['required', Rule::in(['publish', 'archive', 'draft'])]], ['status.*' => 'Statut invalide.']);
        $service->update(['status' => ['publish' => 'published', 'archive' => 'archived', 'draft' => 'draft'][$request->input('status')]]);

        return back()->with('success', 'Statut du service mis à jour.');
    }

    private function data(ServiceRequest $request): array
    {
        $data = $request->safe()->except(['image', 'remove_image']);
        $data['position'] = (int) ($data['position'] ?? 0);
        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : null;

        return $data;
    }
}
