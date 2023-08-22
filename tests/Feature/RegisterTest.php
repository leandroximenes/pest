<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('has errors if the details are not provided', function () {

    post('/register')
        ->assertSessionHasErrors(['name', 'email', 'password']);
});

it('registers the user', function () {

    post('/register', [
        'name' => 'John',
        'email' => 'john@example.com',
        'password' => 'password',
    ])->assertRedirect('/');

    $this->assertDatabaseHas('users', [
        'name' => 'John',
        'email' => 'john@example.com'
    ])->assertAuthenticated();
});
