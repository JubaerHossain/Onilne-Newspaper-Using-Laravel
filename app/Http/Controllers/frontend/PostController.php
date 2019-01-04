<?php

namespace App\Http\Controllers\frontend;

use App\model\admin\Category;
use App\model\admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function category_page($slug)
    {
        $categories=Category::all();
        $category = Category::where('slug',$slug)->first();

        return view('frontend.page.allpage', compact('posts', 'category','categories'));



    }

    public function details($slug)
    {
        $post = Post::where('slug',$slug)->approved()->published()->first();

        $blogKey = 'blog_' . $post->id;

        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey,1);
        }
        $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        return view('post',compact('post','randomposts'));

    }

}
