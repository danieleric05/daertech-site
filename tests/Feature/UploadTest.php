<?php

namespace Tests\Feature;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadTest extends TestCase
{
    use RefreshDatabase;

    private function data(UploadedFile $image): array
    {
        return ['title' => 'Bannière test', 'image' => $image, 'placement' => 'home_top', 'is_active' => 1];
    }

    public function test_banner_upload_replace_delete_and_reject_svg(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->admin()->create());

        $this->post(route('admin.banners.store'), $this->data(UploadedFile::fake()->create('x.svg', 10, 'image/svg+xml')))
            ->assertSessionHasErrors('image');

        $this->post(route('admin.banners.store'), $this->data(UploadedFile::fake()->image('a.png')))
            ->assertSessionHasNoErrors();
        $banner = Banner::firstOrFail();
        Storage::disk('public')->assertExists($banner->image);
        $old = $banner->image;

        $this->put(route('admin.banners.update', $banner), $this->data(UploadedFile::fake()->image('b.jpg')))
            ->assertSessionHasNoErrors();
        Storage::disk('public')->assertMissing($old);
        $new = $banner->fresh()->image;
        Storage::disk('public')->assertExists($new);

        $this->delete(route('admin.banners.destroy', $banner));
        Storage::disk('public')->assertMissing($new);
    }
}
