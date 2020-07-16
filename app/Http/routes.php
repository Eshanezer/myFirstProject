<?php

use App\Country;
use App\Photo;
use App\Post;
use App\Tag;
use App\User;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// parameter pass

/*Route::get('/product/{id}',function ($id){
    return "This is product number ".$id;
});

Route::get('/product/{brand}/{model}',function ($brand,$model){
    return "This is product Details ".$brand." - ".$model;
});*/

// Named Routes
/*Route::get('admin/dashboard/user',array('as'=>'admin.user',function(){
    $url = route('admin.user');
    return "This url is " .$url;
}));

Route::match(['get', 'post'], '/about', function () {
    return "This is About Page";
});


Route::any('/contact', function () {
    return "This is Contact Page";
});*/

/*Custom*/
/*Route::get('/post','PostController@aaa');*/

/*Route::resource('/post','PostController');
Route::get('/post/new/{id}/comment/{cid}','PostController@bb');

Route::any('/contact/{id}','PostController@contact');*/

/* SQL*/

/*INSERT*/
Route::get('/insert', function () {
    DB::insert('insert into posts(title,post) values (?, ?)', ['Laravel', 'post description']);
});

/*Select*/
/*Route::get('/select', function () {
    $result =DB::select('select * from posts where id = ?', [1]);

    return var_dump($result);
});*/

/*update*/
/*Route::get('/update', function () {
    DB::update('update posts set title ="Laravel 5.2" where id = ?', [1]);
});*/

/*delete*/
/*Route::get('/delete', function () {
    $result =DB::delete('delete from posts where id = ?', [1]);
    return  $result;
});*/

/*Named Binding*/
/*
Route::get('/select', function () {
    $result =DB::select('select * from posts where id =:id', ['id'=>2]);

    return  $result;
});*/

/* General Statements*/

/*Route::get('/statements', function () {
    DB::statement('drop table password_resets');
});*/

/*Eloquent - ORM - Model*/ // object relational mapper

/*Data Read */

/*find all*/

/*Route::get('/find', function () {
    $result =Post::all();
    foreach ($result as $post ){
        return $post->post;
    }
});*/

/*find 1*/

/*Route::get('/find-one', function () {
    $posts = Post::find(2)->get();
    foreach ($posts as $post){
        return
            $post->title .' - '.$post->post;
    }
});*/

/* Constraints */
/*Route::get('/find', function () {
    $post =Post::where('title','Laravel')->orderBy('id','desc')->take(50)->get();

    foreach ($post as $post1){
        return $post1->title;
    }
});*/

/*Route::get('/find', function () {
    $post =Post::findOrFail(1);

    return $post;
});*/

/* Insert data*/
/*Route::get('/insert-data', function () {
    $post = new Post;
    $post->title="Laravel Insert ";
    $post->post="Laravel Post";
    $post->likeCount=100;

    $post->save();
 });*/

/* find & update*/

/*Route::get('/basic-update', function () {
    $post = Post::find(2);
    $post->title="Laravel 5.2";
    $post->post="5.2 Documentations";

    $post ->save();
});

Route::get('/basic-delete', function () {
    $post = Post::find(2);
    $post ->delete();
});*/

/*MASS*/

/*update*/
/*Route::get('/update-mass', function () {

    Post::where('id',3)->update(['title'=>'New Php Title','post'=>'I Love Laravel']);
});*/

/*create*/
/*Route::get('/create-mass', function () {
    Post::create(['title'=>'the mass create','post'=>'Mass Content waorking']);
});*/

/*Route::get('/delete-mass-2', function () {
    //Post::destroy(3);
   //Post::destroy([4,6,5]);
    Post::where('id',4)->delete();
});*/

/* Soft delete */

/*Route::get('/soft-delete', function () {
    Post::find(5)->delete();
});*/

/*read*/

/*Route::get('/read-soft-delete', function () {
 // $post = Post::find(5);

   // $post =Post::withTrashed()->get();

   // $post =Post::onlyTrashed()->get();

 return $post;
});*/

/*restore soft delete*/

/*Route::get('/restore-soft-delete', function () {
    Post::onlyTrashed()->where('id',5)->restore();
});*/


/*Route::get('/force-delete', function () {
    Post::onlyTrashed()->where('id',5)->forceDelete();
});*/

/*-----------------      Eloquent Relationship --------------------------*/

/* One - One Relationship */

/*Route::get('/user/{id}/post', function ($id) {
    return User::find($id)->post->post;
});*/

/* ----------Inverse Relation --------------*/

/*Route::get('/post/{id}/user', function ($id) {
    return Post::find($id)->user->name;
});*/

/* One - Many Relationship */

/*Route::get('/user/{id}', function ($id) {
   $user = User::find($id);

   foreach ($user->posts as $post){
       echo $post->post."<br>";
    }
});*/

/* many to many */

/*Route::get('/user/{id}/role', function ($id) {
    $user =User::find($id)->roles()->orderBy('id','asc')->get();

    return $user;
});*/


/*Route::get('/user/pivot', function () {
    $user =User::find(1);
    foreach ($user->roles as $role){
        return $role->pivot;
    }
});*/

/* Has many through relation */

Route::get('/user/country', function () {
   $country= Country::find(1);
   foreach ($country->posts as $post){
       return $post->title;
   }
});

/*Polymorphic relation  */

Route::get('/poly/user', function () {
    $user= User::find(1);
    foreach ($user->photos as $photo){
        return $photo->path;
    }
});

Route::get('/poly/post', function () {
    $post = Post::find(5);
    foreach ($post->photos as $photo) {
        //  return $photo->path;

        echo $photo->path . "<br>";
    }

});

Route::get('/poly/inverse', function () {
    $post =Photo::findOrFail(2);

    return $post->imageable;
});

/* many to many  */

Route::get('/post/tag', function () {
    $post= Post::find(5);
    foreach ($post->tags as $tag) {
        echo $tag->name."<br>";
    }
});

Route::get('/tag/post', function () {
    $tag =Tag::find(3);

    foreach ($tag->post as $post) {
        return $post->title;
    }
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
