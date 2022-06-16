<?php

namespace Tests\Feature;

use App\Models\Cinema;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CinemaTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $this->withoutMiddleware();

        $response = $this->get(route('admin.cinema.index'));

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $this->withoutMiddleware();

        $response = $this->get(route('admin.cinema.create'));

        $response->assertStatus(200);
    }

    public function test_store_edit_update_delete()
    {
        $this->withoutMiddleware();

        Storage::fake('public');

        $image = UploadedFile::fake()->create('test.jpeg');
        $images[] = UploadedFile::fake()->create('test.jpeg');
        $images[] = UploadedFile::fake()->create('test.jpeg');

        $this->post(route('admin.cinema.store'), [
            'title' => 'test title',
            'description' => 'test description',
            'conditions' => 'test conditions',
            'logo_image' => $image,
            'top_banner' => $image,
            'images' => $images,
            'seo_url' => 'seo url',
            'seo_title' => 'seo title',
            'seo_keywords' => 'seo words',
            'seo_description' => 'seo description'
        ]);


        $this->assertDatabaseHas('cinemas', [
            'title' => 'test title',
            'description' => 'test description',
            'conditions' => 'test conditions',
        ]);

        // Edit
        $cinema = Cinema::where('title', 'test title')->first();
        $response = $this->get(route('admin.cinema.edit', $cinema->id));
        $response->assertStatus(200);


        // Update
        $this->patch(route('admin.cinema.update', $cinema->id), [
            'title' => 'update test title',
            'description' => 'update test description',
            'conditions' => 'update test conditions',
            'seo_url' => 'seo url',
            'seo_title' => 'seo title',
            'seo_keywords' => 'seo words',
            'seo_description' => 'seo description'
        ]);


        $this->assertDatabaseHas('cinemas', [
            'title' => 'update test title',
            'description' => 'update test description',
            'conditions' => 'update test conditions',
        ]);

        // Delete
        $this->delete(route('admin.cinema.delete', $cinema->id));
        $this->assertDatabaseMissing('cinemas', ['id' => $cinema->id]);
    }


}
