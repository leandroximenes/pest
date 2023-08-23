<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('shows the register page')->get('auth/register')->assertSatatus(200);

it('has errors if the details are not provided')
    ->post('/register')
    ->assertSessionHasErrors(['name', 'email', 'password']);

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
