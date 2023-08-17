<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('greets the user if they are signed out', function () {
    $this->get('/')
        ->assertSee('Bookfriends')
        ->assertSee('Sign up to get started.')
        ->assertDontSee('Feed');
});


it('shows authenticated menu items if the user is signed in', function () {

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/')
        ->assertSeeText(
            [$user->name, 'Feed', 'My books', 'Add a book', 'Friend']
        );
});

it('shows unauthenticated menu items if the user is not signed in', function () {

    $this->get('/')
        ->assertSee(
            ['Login', 'Register']
        );
});
