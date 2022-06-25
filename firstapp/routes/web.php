<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routers
// -> untuk home page
Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Muh Zaqi Ikhwanul Kiram",
        "email" => "zaqiikhwan22@student.ub.ac.id",
        "image" => "zaqi.jpg"
    ]);
});

Route::get('/blog', function () {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Zaqi Ikhwan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis nihil aut aspernatur voluptatem tenetur. Placeat cupiditate rem voluptates aut voluptate voluptas minus. Ut provident voluptas optio nulla numquam perferendis sunt blanditiis quia illo ullam alias vel est ea temporibus, soluta, consequuntur tempora. Suscipit vel error nesciunt odit alias quas ab ad facilis dolores doloremque. A nulla sunt itaque nisi, nobis accusamus quae accusantium porro odio aperiam libero numquam molestias sit sint explicabo. Velit aspernatur earum esse, nobis adipisci veniam fuga."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Ikhwan Zaqi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis nihil aut aspernatur voluptatem tenetur. Placeat cupiditate rem voluptates aut voluptate voluptas minus. Ut provident voluptas optio nulla numquam perferendis sunt blanditiis quia illo ullam alias vel est ea temporibus, soluta, consequuntur tempora. Suscipit vel error nesciunt odit alias quas ab ad facilis dolores doloremque. A nulla sunt itaque nisi, nobis accusamus quae accusantium porro odio aperiam libero numquam molestias sit sint explicabo. Velit aspernatur earum esse, nobis adipisci veniam fuga."
        ],
        [
            "title" => "Judul Post Ketiga",
            "slug" => "judul-post-ketiga",
            "author" => "Kiram Zaqi",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur, odio. Adipisci nihil laudantium optio cupiditate, consequuntur perspiciatis tempora, dolorum praesentium cum ducimus, dicta at sed quod ad quo. Distinctio aspernatur, atque obcaecati, vero, odit expedita aperiam nulla odio facilis magni culpa! Inventore explicabo saepe natus nihil atque omnis, officia iure voluptatum quidem pariatur porro consequuntur voluptate ipsum, quis, beatae facere voluptates! Optio numquam cupiditate quaerat perspiciatis, expedita quibusdam sapiente. Assumenda quidem modi aliquid reprehenderit at commodi quasi voluptatem repudiandae ex! Animi, nisi atque? In veniam suscipit aperiam, natus quidem assumenda temporibus quam hic adipisci explicabo omnis doloremque ab odio eligendi."
        ],
    ];
    return view('posts', [
        "title" => "Posts",
        "posts" => $blog_posts
    ]);
});

// halaman single post
Route::get('posts/{slug}', function($slug) {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Zaqi Ikhwan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis nihil aut aspernatur voluptatem tenetur. Placeat cupiditate rem voluptates aut voluptate voluptas minus. Ut provident voluptas optio nulla numquam perferendis sunt blanditiis quia illo ullam alias vel est ea temporibus, soluta, consequuntur tempora. Suscipit vel error nesciunt odit alias quas ab ad facilis dolores doloremque. A nulla sunt itaque nisi, nobis accusamus quae accusantium porro odio aperiam libero numquam molestias sit sint explicabo. Velit aspernatur earum esse, nobis adipisci veniam fuga."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Ikhwan Zaqi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis nihil aut aspernatur voluptatem tenetur. Placeat cupiditate rem voluptates aut voluptate voluptas minus. Ut provident voluptas optio nulla numquam perferendis sunt blanditiis quia illo ullam alias vel est ea temporibus, soluta, consequuntur tempora. Suscipit vel error nesciunt odit alias quas ab ad facilis dolores doloremque. A nulla sunt itaque nisi, nobis accusamus quae accusantium porro odio aperiam libero numquam molestias sit sint explicabo. Velit aspernatur earum esse, nobis adipisci veniam fuga."
        ],
        [
            "title" => "Judul Post Ketiga",
            "slug" => "judul-post-ketiga",
            "author" => "Kiram Zaqi",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur, odio. Adipisci nihil laudantium optio cupiditate, consequuntur perspiciatis tempora, dolorum praesentium cum ducimus, dicta at sed quod ad quo. Distinctio aspernatur, atque obcaecati, vero, odit expedita aperiam nulla odio facilis magni culpa! Inventore explicabo saepe natus nihil atque omnis, officia iure voluptatum quidem pariatur porro consequuntur voluptate ipsum, quis, beatae facere voluptates! Optio numquam cupiditate quaerat perspiciatis, expedita quibusdam sapiente. Assumenda quidem modi aliquid reprehenderit at commodi quasi voluptatem repudiandae ex! Animi, nisi atque? In veniam suscipit aperiam, natus quidem assumenda temporibus quam hic adipisci explicabo omnis doloremque ab odio eligendi."
        ],
    ];

    $new_post = [];
    foreach ($blog_posts as $post) {
        if ($post["slug"] === $slug) {
            $new_post = $post;
        }
    }


    return view('post', [
        "title" => "Single Post",
        "post" => $new_post
    ]);
});
