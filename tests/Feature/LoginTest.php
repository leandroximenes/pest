<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('redirects authenticated user', function () {
    $user = User::factory()->create();
    // actingAs is a helper function that allows you to authenticate a user for your tests.
    $this->actingAs($user)
        ->get('/auth/login')
        ->assertStatus(302)
        ->assertRedirect('/');
});

it('shows an error if the details are not provied ')
    ->post('/login')
    ->assertSessionHasErrors(['email', 'password']);

it('logs in the user', function () {
    $user = User::factory()->create([
        'password' => bcrypt('hello!'),
    ]);
    $this->post('/login', [
        'email' => $user->email,
        'password' => 'hello!',
    ])->assertRedirect('/');
    $this->assertAuthenticatedAs($user);
});

// it('does not allow logs in the user', function () {
//     $user = User::factory()->create([
//         'password' => bcrypt('hello!'),
//     ]);

//     $response = $this->post('/auth/login', [
//         'email' => $user->email,
//         'password' => '12345678', // Incorrect password
//     ]);

//     $response->assertRedirect('/auth/login');


// });
