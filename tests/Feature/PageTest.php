<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PageTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_update_delete()
    {
        $this->withoutMiddleware();

        Storage::fake('public');

        $image = UploadedFile::fake()->create('test.jpeg');
        $images[] = UploadedFile::fake()->create('test.jpeg');
        $images[] = UploadedFile::fake()->create('test.jpeg');

        $this->post(route('admin.page.store'), [
            'title' => 'test title',
            'content' => 'test content',
            'status' => '0',
            'main_image' => $image,
            'images' => $images,
            'seo_url' => 'seo url',
            'seo_title' => 'seo title',
            'seo_keywords' => 'seo words',
            'seo_description' => 'seo description'
        ]);


        $this->assertDatabaseHas('pages', [
            'title' => 'test title',
            'content' => 'test content',
            'status' => '0',
        ]);

        $page = Page::where('title', 'test title')->first();

        // Update
        $this->patch(route('admin.page.update', $page->id), [
            'title' => 'update test title',
            'content' => 'update test content',
            'status' => '1',
            'seo_url' => 'seo url',
            'seo_title' => 'seo title',
            'seo_keywords' => 'seo words',
            'seo_description' => 'seo description'
        ]);


        $this->assertDatabaseHas('pages', [
            'title' => 'update test title',
            'content' => 'update test content',
            'status' => '1',
        ]);

        // Delete
        $this->delete(route('admin.page.delete', $page->id));
        $this->assertDatabaseMissing('pages', ['id' => $page->id]);
    }
}
