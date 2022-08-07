<?php

namespace App\Models;

class Post 
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Dameuli",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eum molestiae quos exercitationem dolorum architecto non, libero magni natus enim a. Nam, iure dolorem excepturi minima sapiente fugit laboriosam alias possimus repellat earum ratione quas impedit mollitia harum eos totam, debitis provident nulla amet cupiditate, ab eveniet suscipit sit corrupti! Non sit quas libero quaerat aliquid temporibus repellendus obcaecati eveniet laudantium eligendi. Quibusdam maxime animi facilis minus quisquam? Hic distinctio facilis necessitatibus iure totam fugit eos suscipit consequuntur, sed aspernatur!" 
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Ulimut",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat eius numquam vitae quae nihil odio repellat asperiores delectus porro assumenda. Est veritatis, nesciunt praesentium rem sapiente aliquam, exercitationem, accusamus nostrum enim omnis dolorum illo deserunt fuga consectetur. Fuga minima ipsa nihil, ipsam adipisci in quas deleniti veniam sint quis fugiat! Alias aliquam, iure sapiente minus corporis, dolorum molestiae maiores vitae consectetur vel impedit laborum accusamus amet quis assumenda reiciendis. Quod odit dolore est nobis ad aspernatur natus, enim dolorum facere, eos, voluptatum assumenda adipisci. Mollitia molestias impedit ab omnis obcaecati labore quibusdam accusantium vel voluptas voluptatem fugit odit dolor voluptatibus est officiis quidem quia esse, eaque atque aliquam. Sunt, ut? Excepturi nam dolores quia ratione inventore quod voluptates facere cum quibusdam ut! Officiis repellendus quibusdam sapiente neque obcaecati, quod hic consequatur cum in voluptatibus dolorum similique voluptas minima suscipit facilis nesciunt dolore necessitatibus maxime ducimus assumenda ipsum, optio blanditiis doloribus."
        ],
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }  
}
 