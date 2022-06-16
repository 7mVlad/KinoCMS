<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use WithoutMiddleware;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $this->withoutMiddleware();

        $response = $this->get(route('admin.user.index'));

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $this->withoutMiddleware();

        $response = $this->get(route('admin.user.create'));

        $response->assertStatus(200);
    }

    public function test_store_delete()
    {
        $this->withoutMiddleware();

        $this->post(route('admin.user.store'), [
            'name' => 'test name',
            'email' => 'test@test.com',
            'last_name' => 'test last_name',
            'pseudonym' => 'test pseudonym',
            'address' => 'test address',
            'card_number' => '11111',
            'language' => 'ua',
            'gender' => 'man',
            'phone' => '11111',
            'birthday' => '2022-06-15',
            'city' => 'test',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'test name',
            'email' => 'test@test.com',
            'last_name' => 'test last_name',
            'pseudonym' => 'test pseudonym',
            'address' => 'test address',
            'card_number' => '11111',
            'language' => 'ua',
            'gender' => 'man',
            'phone' => '11111',
            'birthday' => '2022-06-15',
            'city' => 'test',
        ]);

        $user = User::where('name', 'test name')->first();

        $this->delete(route('admin.user.delete', $user->id));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

}
