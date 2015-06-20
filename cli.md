# Set up a localhost server port 8080 and directory is public
$ php -S localhost:8080 -t public

$ php artisan serv


# generate a PagesController by command line
# --plain Generate an empty controller class.
php artisan make:controller PagesController --plain

# check make:controller property
$ php aritisan make:controller --help
$ php artisan help make:controller

# set up schema
$ php artisan migrate
# rollback schema
$ php artisan migrate:rollback
# create an artisan migration
$ php artisan make:migration create_articles_table --create="articles"
# create an artisan migration on which table
$ php artisan make:migration add_excerpt_to_articles_table --table="articles"

# if dont have doctrine\dbal package, migration:rollback will crash, so just install the package by composer
$ composer require doctrine/dbal

# create a new Article model
$ php artisan make:model Article

# use tinker to CRUD data
$ php artisan tinker
>>> $article = new App\Article
=> <App\Article #00000000330bfa2600000001654c06fc> {}
>>> $article
=> <App\Article #00000000330bfa2600000001654c06fc> {}
>>> $article->title = 'my first article'
=> "my first article"
>>> $article->body = 'this is body'
=> "this is body"
>>> $article->published_at = Carbon\Carbon::now();
=> <Carbon\Carbon #00000000330bfa2900000001654cf354> {
       date: "2015-06-20 14:32:47.000000",
       timezone_type: 3,
       timezone: "UTC"
   }
>>> $article;
=> <App\Article #00000000330bfa2600000001654c06fc> {
       title: "my first article",
       body: "this is body",
       published_at: <Carbon\Carbon #00000000330bfa2900000001654cf354> {
           date: "2015-06-20 14:32:47.000000",
           timezone_type: 3,
           timezone: "UTC"
       }
   }
# show data in Array form
>>> $article->toArray();
=> [
       "title"        => "my first article",
       "body"         => "this is body",
       "published_at" => <Carbon\Carbon #00000000330bfa2900000001654cf354> {
           date: "2015-06-20 14:32:47.000000",
           timezone_type: 3,
           timezone: "UTC"
       }
   ]
# save data
>>> $article->save();
=> true
>>> App\Article::all()->toArray();
=> [
       [
           "id"           => 1,
           "title"        => "my first article",
           "body"         => "this is body",
           "created_at"   => "2015-06-20 14:34:21",
           "updated_at"   => "2015-06-20 14:34:21",
           "published_at" => "2015-06-20 14:32:47"
       ]
   ]
>>> $article->toArray();
=> [
       "title"        => "my first article",
       "body"         => "this is body",
       "published_at" => <Carbon\Carbon #00000000330bfa2900000001654cf354> {
           date: "2015-06-20 14:32:47.000000",
           timezone_type: 3,
           timezone: "UTC"
       },
       "updated_at"   => "2015-06-20 14:34:21",
       "created_at"   => "2015-06-20 14:34:21",
       "id"           => 1
   ]
>>> $article->title = 'Update My title'
=> "Update My title"
>>> $article->save();
=> true
>>> App\Article::all()->toArray();
=> [
       [
           "id"           => 1,
           "title"        => "Update My title",
           "body"         => "this is body",
           "created_at"   => "2015-06-20 14:34:21",
           "updated_at"   => "2015-06-20 14:36:39",
           "published_at" => "2015-06-20 14:32:47"
       ]
   ]
>>> $article = App\Article::find(1);
=> <App\Article #00000000330bfa1900000001654c06fc> {
       id: 1,
       title: "Update My title",
       body: "this is body",
       created_at: "2015-06-20 14:34:21",
       updated_at: "2015-06-20 14:36:39",
       published_at: "2015-06-20 14:32:47"
   }
>>> $article->toArray();
=> [
       "id"           => 1,
       "title"        => "Update My title",
       "body"         => "this is body",
       "created_at"   => "2015-06-20 14:34:21",
       "updated_at"   => "2015-06-20 14:36:39",
       "published_at" => "2015-06-20 14:32:47"
   ]
>>> $article->title;
=> "Update My title"
>>> $article = App\Article::where('body', 'this is body')->get();
=> <Illuminate\Database\Eloquent\Collection #00000000330bfa0200000001654c06fc> [
       <App\Article #00000000330bfa0100000001654c06fc> {
           id: 1,
           title: "Update My title",
           body: "this is body",
           created_at: "2015-06-20 14:34:21",
           updated_at: "2015-06-20 14:36:39",
           published_at: "2015-06-20 14:32:47"
       }
   ]
>>> $article = App\Article::where('body', 'this is body')->first();
=> <App\Article #00000000330bfa1f00000001654c06fc> {
       id: 1,
       title: "Update My title",
       body: "this is body",
       created_at: "2015-06-20 14:34:21",
       updated_at: "2015-06-20 14:36:39",
       published_at: "2015-06-20 14:32:47"
   }
>>> $article->body;
=> "this is body"
# Error , need to add protected in Article Model
>>> $article = App\Article::create([ 'title' => 'new article', 'body' => 'new body', 'published_at' => Carbon\Carbon::now()]);
Illuminate\Database\Eloquent\MassAssignmentException with message 'title'
# Remember to login again or else it cant create a new data
>>> $article = App\Article::create([ 'title' => 'new article', 'body' => 'new body', 'published_at' => Carbon\Carbon::now()]);
=> <App\Article #000000003cde6a54000000016159ca67> {
       title: "new article",
       body: "new body",
       published_at: <Carbon\Carbon #000000003cde6a53000000016159bfcf> {
           date: "2015-06-20 14:50:28.000000",
           timezone_type: 3,
           timezone: "UTC"
       },
       updated_at: "2015-06-20 14:50:28",
       created_at: "2015-06-20 14:50:28",
       id: 3
   }
>>> App\Article::all()->toArray();
=> [
       [
           "id"           => 1,
           "title"        => "Update My title",
           "body"         => "this is body",
           "created_at"   => "2015-06-20 14:34:21",
           "updated_at"   => "2015-06-20 14:36:39",
           "published_at" => "2015-06-20 14:32:47"
       ],
       [
           "id"           => 3,
           "title"        => "new article",
           "body"         => "new body",
           "created_at"   => "2015-06-20 14:50:28",
           "updated_at"   => "2015-06-20 14:50:28",
           "published_at" => "2015-06-20 14:50:28"
       ]
   ]
# Find id 3 and modify the body
>>> $article = App\Article::find(3);
=> <App\Article #0000000020048f2d000000012fe74c36> {
       id: 3,
       title: "new article",
       body: "new body",
       created_at: "2015-06-20 14:50:28",
       updated_at: "2015-06-20 14:50:28",
       published_at: "2015-06-20 14:50:28"
   }
>>> $article->toArray();
=> [
       "id"           => 3,
       "title"        => "new article",
       "body"         => "new body",
       "created_at"   => "2015-06-20 14:50:28",
       "updated_at"   => "2015-06-20 14:50:28",
       "published_at" => "2015-06-20 14:50:28"
   ]
>>> $article->body ='update';
=> "update"
>>> $article->save();
=> true
>>> $article->toArray();
=> [
       "id"           => 3,
       "title"        => "new article",
       "body"         => "update",
       "created_at"   => "2015-06-20 14:50:28",
       "updated_at"   => "2015-06-20 14:54:18",
       "published_at" => "2015-06-20 14:50:28"
   ]
# method 2
>>> $article->update(['body' => 'update again']);
=> true
>>> $article->toArray();
=> [
       "id"           => 3,
       "title"        => "new article",
       "body"         => "update again",
       "created_at"   => "2015-06-20 14:50:28",
       "updated_at"   => "2015-06-20 14:55:41",
       "published_at" => "2015-06-20 14:50:28"
   ]
