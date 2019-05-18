# How To Test Laravel Code

Software testing is really required to point out the defects and errors that were made during the development phases, and Laravel is not defferente. 
In this project I demonstrated how to write tests with laravel.

## Getting Started


I developed this mini project for the purpose of practicing TDD with laravel. The application is a blog to publish and read articles.

### The Core 


I organized the tests in three main steps as they are named below.

* Arrangement
* Action
* Assert

- In **Arrangment** We create posts, first we need to create a test ``` php artisan make:test ViewPostTest ```  we write the code below in the file that the artisan generated.

```ruby
 use DatabaseMigrations;

  public function testCanViewABlogPost()
  {

      // Arrangement
      // creating a blog post
      $post = Post::create([
          'title' => 'Simple title',
          'body' => 'Simple body'
      ]);
  }
```

after creating a post, we need to view the created post, as we already know in laravel we have no view without routers, so let's go to part two of our test **action**

```ruby
      use DatabaseMigrations;

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
  }
```

So far so good, what's missing now is to make some asserts.

```ruby
    use DatabaseMigrations;

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
      $resp->assertSee($post->created_at->toFormattedDateString());
  }
```

Now you can run the testes....

```ruby
vendor/bin/phpunit
```


### Installing

Clone the project

```
https://github.com/tandavala/Laravel-Testing.git
```

update 

```
composer update
```

copy the .env.exemple to .env

```
cp .env.exemple .env
```

Generate the key

```
php artisan key:gen
```

## Running 

```
php artisan serve
```

## Authors

* **Jose Tandavala**  - [Facebook](https://facebook.com/jose.tandavala)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details



