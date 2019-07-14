<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowPostTest extends TestCase
{
    function test_a_user_can_see_the_post_details()
    {
        $user = $this->defaultUser([
            'name' => 'Duilio Palacios'
        ]);

        $post = factory(\App\Post::class)->make([
            'title' => 'Como instalar Laravel',
            'content' => 'Este es el contenido del post'
        ]);

        $user->posts()->save($post);

        $this->visit(route('posts.show', $post))
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);

    }
}
