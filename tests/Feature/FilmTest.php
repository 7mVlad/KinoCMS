<?php

namespace Tests\Feature;

use App\Models\Film;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FilmTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $this->withoutMiddleware();

        $response = $this->get(route('admin.film.index'));

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $this->withoutMiddleware();

        $response = $this->get(route('admin.film.create'));

        $response->assertStatus(200);
    }

    public function test_store_edit_update_delete()
    {
        $this->withoutMiddleware();

        Storage::fake('public');

        $image = UploadedFile::fake()->create('test.jpeg');
        $images[] = UploadedFile::fake()->create('test.jpeg');
        $images[] = UploadedFile::fake()->create('test.jpeg');

        $this->post(route('admin.film.store'), [
            'title' => 'test title',
            'content' => 'test content',
            'main_image' => $image,
            'images' => $images,
            'trailer_link' => 'test link',
            'release' => '0',
            'seo_url' => 'seo url',
            'seo_title' => 'seo title',
            'seo_keywords' => 'seo words',
            'seo_description' => 'seo description'
        ]);


        $this->assertDatabaseHas('films', [
            'title' => 'test title',
            'content' => 'test content',
            'trailer_link' => 'test link',
            'release' => '0',
        ]);

        // Edit
        $film = Film::where('title', 'test title')->first();
        $response = $this->get(route('admin.film.edit', $film->id));
        $response->assertStatus(200);


        // Update
        $this->patch(route('admin.film.update', $film->id), [
            'title' => 'update test title',
            'content' => 'update test content',
            'trailer_link' => 'update test link',
            'release' => '1',
            'seo_url' => 'seo url',
            'seo_title' => 'seo title',
            'seo_keywords' => 'seo words',
            'seo_description' => 'seo description'
        ]);


        $this->assertDatabaseHas('films', [
            'title' => 'update test title',
            'content' => 'update test content',
            'trailer_link' => 'update test link',
            'release' => '1',
        ]);

        // Delete
        $this->delete(route('admin.film.delete', $film->id));
        $this->assertDatabaseMissing('films', ['id' => $film->id]);
    }


}
