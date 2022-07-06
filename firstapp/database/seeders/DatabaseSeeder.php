<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Muh Zaqi',
        //     'email' => 'zaqi@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Eryc Zulk',
        //     'email' => 'eryc@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, exercitationem dolor neque accusamus eveniet fugiat voluptates similique, nam deserunt adipisci nostrum obcaecati corporis ipsam. Dolor magni earum libero natus, dicta consequatur tempore consectetur vitae, quo odit voluptatibus voluptas tenetur ipsa. Molestias quis laboriosam ipsam tenetur consequuntur quidem qui totam reiciendis aliquid architecto! Provident incidunt, earum debitis pariatur ex eius quasi eligendi possimus doloribus similique voluptas fugiat odit mollitia dicta corporis, accusamus expedita voluptatibus nulla veniam aliquid fuga impedit blanditiis. Dicta, quia, dignissimos ea velit accusamus autem nam quas voluptatem maiores, fuga porro! Nemo id consectetur sapiente, eligendi impedit architecto eveniet asperiores velit tempora molestias qui, culpa vitae quasi facilis suscipit doloribus, repellat nesciunt quam eaque aliquam unde cum! Maiores, officia.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, exercitationem dolor neque accusamus eveniet fugiat voluptates similique, nam deserunt adipisci nostrum obcaecati corporis ipsam. Dolor magni earum libero natus, dicta consequatur tempore consectetur vitae, quo odit voluptatibus voluptas tenetur ipsa. Molestias quis laboriosam ipsam tenetur consequuntur quidem qui totam reiciendis aliquid architecto! Provident incidunt, earum debitis pariatur ex eius quasi eligendi possimus doloribus similique voluptas fugiat odit mollitia dicta corporis, accusamus expedita voluptatibus nulla veniam aliquid fuga impedit blanditiis. Dicta, quia, dignissimos ea velit accusamus autem nam quas voluptatem maiores, fuga porro! Nemo id consectetur sapiente, eligendi impedit architecto eveniet asperiores velit tempora molestias qui, culpa vitae quasi facilis suscipit doloribus, repellat nesciunt quam eaque aliquam unde cum! Maiores, officia.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, exercitationem dolor neque accusamus eveniet fugiat voluptates similique, nam deserunt adipisci nostrum obcaecati corporis ipsam. Dolor magni earum libero natus, dicta consequatur tempore consectetur vitae, quo odit voluptatibus voluptas tenetur ipsa. Molestias quis laboriosam ipsam tenetur consequuntur quidem qui totam reiciendis aliquid architecto! Provident incidunt, earum debitis pariatur ex eius quasi eligendi possimus doloribus similique voluptas fugiat odit mollitia dicta corporis, accusamus expedita voluptatibus nulla veniam aliquid fuga impedit blanditiis. Dicta, quia, dignissimos ea velit accusamus autem nam quas voluptatem maiores, fuga porro! Nemo id consectetur sapiente, eligendi impedit architecto eveniet asperiores velit tempora molestias qui, culpa vitae quasi facilis suscipit doloribus, repellat nesciunt quam eaque aliquam unde cum! Maiores, officia.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, exercitationem dolor neque accusamus eveniet fugiat voluptates similique, nam deserunt adipisci nostrum obcaecati corporis ipsam. Dolor magni earum libero natus, dicta consequatur tempore consectetur vitae, quo odit voluptatibus voluptas tenetur ipsa. Molestias quis laboriosam ipsam tenetur consequuntur quidem qui totam reiciendis aliquid architecto! Provident incidunt, earum debitis pariatur ex eius quasi eligendi possimus doloribus similique voluptas fugiat odit mollitia dicta corporis, accusamus expedita voluptatibus nulla veniam aliquid fuga impedit blanditiis. Dicta, quia, dignissimos ea velit accusamus autem nam quas voluptatem maiores, fuga porro! Nemo id consectetur sapiente, eligendi impedit architecto eveniet asperiores velit tempora molestias qui, culpa vitae quasi facilis suscipit doloribus, repellat nesciunt quam eaque aliquam unde cum! Maiores, officia.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
