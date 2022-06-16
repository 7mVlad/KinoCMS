<?php

namespace Tests\Feature;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $this->withoutMiddleware();

        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $this->withoutMiddleware();

        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function test_store_edit_update_delete()
    {
        $this->withoutMiddleware();

        Storage::fake('public');

        $image = UploadedFile::fake()->create('test.jpeg');
        $images[] = UploadedFile::fake()->create('test.jpeg');
        $images[] = UploadedFile::fake()->create('test.jpeg');

        $this->post(route('admin.news.store'), [
            'title' => 'test title',
            'content' => 'test content',
            'date' => '2022-06-15',
            'status' => '0',
            'main_image' => $image,
            'images' => $images,
            'video_link' => 'test link',
            'seo_url' => 'seo url',
            'seo_title' => 'seo title',
            'seo_keywords' => 'seo words',
            'seo_description' => 'seo description'
        ]);


        $this->assertDatabaseHas('news', [
            'title' => 'test title',
            'content' => 'test content',
            'date' => '2022-06-15',
            'status' => '0',
            'video_link' => 'test link',
        ]);

        // Edit
        $news = News::where('title', 'test title')->first();
        $response = $this->get(route('admin.news.edit', $news->id));
        $response->assertStatus(200);


        // Update
        $this->patch(route('admin.news.update', $news->id), [
            'title' => 'update test title',
            'content' => 'update test content',
            'date' => '2022-06-17',
            'status' => '1',
            'video_link' => 'update test link',
            'seo_url' => 'seo url',
            'seo_title' => 'seo title',
            'seo_keywords' => 'seo words',
            'seo_description' => 'seo description'
        ]);


        $this->assertDatabaseHas('news', [
            'title' => 'update test title',
            'content' => 'update test content',
            'date' => '2022-06-17',
            'status' => '1',
            'video_link' => 'update test link',
        ]);

        // Delete
        $this->delete(route('admin.news.delete', $news->id));
        $this->assertDatabaseMissing('news', ['id' => $news->id]);
    }
}
