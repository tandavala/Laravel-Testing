<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewBlogPostTest extends TestCase
{
  public function testCanViewABlogPost()
  {
      // Arrangement
      // creating a blog post
      $post = Post::create([
          'title' => 'Simple title',
          'body' => 'Simple body'
      ]);
      // Action
      //visiting a route
      $resp = $this->get("/post/{$post->id}");

      // Assert
      // assert status 200
      $resp->assertStatus(200);
      // assert that we see post title
      $resp->assertSee($post->title);
      // assert that we see post body
      $resp->assertSee($post->body);
      // assert that we see pubished data
      $resp->assertSee($post->created_at);
  }
}
