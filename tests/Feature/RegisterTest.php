<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('shows the register page')->get('auth/register')->assertStatus(200);

it('has errors if the details are not provided')
    ->post('/register')
    ->assertSessionHasErrors(['name', 'email', 'password']);

/**
 * This test covers the complete user registration process.
 * It first visits the registration page, then submits the form with the required details.
 * It then asserts that the user is registered, the user is redirected to the home page, and the user is authenticated.
 *
 * It uses the tap function to execute a callback within a fluent chain.
 */
it('registers the user')
    ->tap(function () {
        $this->post('/register', [
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => 'password',
        ])->assertRedirect('/');
    })
    ->assertDatabaseHas('users', ['email' => 'john@example.com'])
    ->assertAuthenticated();
