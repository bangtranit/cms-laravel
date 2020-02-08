<?php

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        factory(Category::class, 20)->create();
//        factory(Post::class, 50)->create();
//        factory(Tag::class, 10)->create();

        $this->call(UserTableSeed::class);
        $this->call(PostTableSeed::class);
    }
}
