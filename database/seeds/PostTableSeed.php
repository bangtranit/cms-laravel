<?php

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Database\Seeder;

class PostTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'title' => 'News',
            'description' => 'News'
        ]);

        $category2 = Category::create([
            'title' => 'Marketing',
            'description' => 'News'
        ]);

        $category3 = Category::create([
            'title' => 'HIRING',
            'description' => 'HIRING'
        ]);

        $category4 = Category::create([
            'title' => 'Partnership',
            'description' => 'Partnership'
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',

            'description' => 'Lorem Ipsum is simply dummy text of the printing and 
            typesetting indus',

            'content' => 'Lorem Ipsum is simply dummy text of the printing and 
            typesetting industry. Lorem Ipsum has been the industry\'s 
            standard dummy text ever since the 1500s, when an unknown printer took a 
            galley of type and scrambled it to make a type specimen book. ',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'

        ]);

        $post2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',

            'description' => 'Lorem Ipsum is simply dummy text of the printing and 
            typesetting indus',

            'content' => 'Lorem Ipsum is simply dummy text of the printing and 
            typesetting industry. Lorem Ipsum has been the industry\'s 
            standard dummy text ever since the 1500s, when an unknown printer took a 
            galley of type and scrambled it to make a type specimen book. ',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'

        ]);

        $post3 = Post::create([
            'title' => 'Best practices for minimalist design with example',

            'description' => 'Lorem Ipsum is simply dummy text of the printing and 
            typesetting indus',

            'content' => 'Lorem Ipsum is simply dummy text of the printing and 
            typesetting industry. Lorem Ipsum has been the industry\'s 
            standard dummy text ever since the 1500s, when an unknown printer took a 
            galley of type and scrambled it to make a type specimen book. ',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'

        ]);

        $post4 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',

            'description' => 'Lorem Ipsum is simply dummy text of the printing and 
            typesetting indus',

            'content' => 'Lorem Ipsum is simply dummy text of the printing and 
            typesetting industry. Lorem Ipsum has been the industry\'s 
            standard dummy text ever since the 1500s, when an unknown printer took a 
            galley of type and scrambled it to make a type specimen book. ',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg'
        ]);

        $tag1 = Tag::create([
            'name' => 'job'
        ]);

        $tag2 = Tag::create([
            'name' => 'customer'
        ]);

        $tag3 = Tag::create([
            'name' => 'record'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);


    }
}
