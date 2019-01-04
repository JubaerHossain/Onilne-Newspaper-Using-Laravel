<?php

namespace App\Http\Controllers\admin\page;

use App\model\admin\Category;
use App\model\admin\Post;
use App\model\frontend\Subscribe;
use App\model\admin\Tag;
use App\Notifications\Admin\ApprovePost;
use App\Notifications\Admin\AuthorNotification;
use App\Notifications\Admin\NewPostSubcriber;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        foreach ($users as $user)

        $posts=Post::latest()->get();
        return view('admin.page.post.index',compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.page.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'image' => 'required',
                'categories' => 'required',
                'tags' => 'required',
                'body' => 'required',
            ]);
            $image = $request->file('image');
            $slug = str_slug($request->title);
            if (isset($image)) {
//            make unique name for image
                $currentDate = Carbon::now()->toDateString();
                $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            check category dir is exists
                if (!Storage::disk('public')->exists('post')) {
                    Storage::disk('public')->makeDirectory('post');
                }
//            resize image for category and upload
                $category = Image::make($image)->resize(656, 307)->stream();
                Storage::disk('public')->put('post/' . $imagename, $category);

                //            check category slider dir is exists
                if (!Storage::disk('public')->exists('post/single')) {
                    Storage::disk('public')->makeDirectory('post/single');
                }
                //            resize image for category slider and upload
                $slider = Image::make($image)->resize(704, 330)->stream();
                Storage::disk('public')->put('post/single/' . $imagename, $slider);

            } else {
                $imagename = "default.png";
            }
            $post = new Post();
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = $slug;
            $post->image = $imagename;
            $post->body = $request->body;

            if (isset($request->status)) {
                $post->status = true;
            } else {
                $post->status = false;
            }
            $role = Auth::user()->id;
            if ($role == 1) {
                $post->is_approved = true;

            } else {
                $post->is_approved = false;

            }
            $post->save();
            $post->categories()->attach($request->categories);
            $post->tags()->attach($request->tags);

            $data=Auth::user()->id;
            if ($data == 1){
                $subscribers = Subscribe::all();
                foreach ($subscribers as $subscriber)
                {
                    Notification::route('mail',$subscriber->email)
                        ->notify(new NewPostSubcriber($post));
                }
            }
            if ($data != 1) {
                $users = User::where('id', '1')->get();
                Notification::send($users, new AuthorNotification($post));
            }

            Toastr::success('Post Successfully Saved :)', 'Success');
            return redirect()->route('post.index');
        }
        catch (Exception $e){
            return view('admin.includes.errors.401');

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = Auth::user();
        if ($user->id) {
            $role = $user->roles()->pluck('name')->implode(' ');
            if ($role =='Admin') {
                return view('admin.page.post.show', compact('post'));
            }if ($role !='Admin') {
                if ($user->id ==$post->user_id){

                    return view('admin.page.post.show', compact('post'));

                }
                else
                    Toastr::error('You are not authorized to access this post', 'Error');
                     return redirect()->back();            }

        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.page.post.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $this->validate($request,[
            'title' => 'required',
            'image' => 'image',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }
//            resize image for category and upload
            $category = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('post/'.$imagename,$category);

            //            check category slider dir is exists
            if (!Storage::disk('public')->exists('post/single'))
            {
                Storage::disk('public')->makeDirectory('post/single');
            }
            //            resize image for category slider and upload
            $slider = Image::make($image)->resize(500,333)->stream();
            Storage::disk('public')->put('post/single/'.$imagename,$slider);

        }
        else
        {

            $imagename = $post->image;
        }
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->body = $request->body;

        if(isset($request->status))
        {
            $post->status = true;
        }else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        Toastr::success('Post Successfully update :)','Success');
        return redirect()->route('post.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)    {


        if (Storage::disk('public')->exists('post/'.$post->image))
        {
            Storage::disk('public')->delete('post/'.$post->image);
        }

        if (Storage::disk('public')->exists('post/single/'.$post->image))
        {
            Storage::disk('public')->delete('post/single/'.$post->image);
        }
        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();
        Toastr::success('Post Successfully Deleted :)','Success');
        return redirect()->back();
    }
    public function pending()
    {
        $posts = Post::where('is_approved',false)->get();
        return view('admin.page.post.pending',compact('posts'));
    }


    public function approval($id)
    {
        $post = Post::find($id);

        if ($post->is_approved == false)
        {
            $post->is_approved = true;
            $post->save();

            $post->user->notify(new ApprovePost($post));

            $subscribers = Subscribe::all();
            foreach ($subscribers as $subscriber)
            {
                Notification::route('mail',$subscriber->email)
                    ->notify(new NewPostSubcriber($post));
            }

            Toastr::success('Post Successfully Approved :)','Success');
        } else {
            Toastr::info('This Post is already approved','Info');
        }
        return redirect()->back();
    }
    public function publish($id)
    {
        $post = Post::find($id);

        if ($post->status == false)
        {
            $post->status = true;
            $post->save();
/*
            $post->user->notify(new AuthorPostApproved($post));

            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber)
            {
                Notification::route('mail',$subscriber->email)
                    ->notify(new NewPostNotify($post));
            }*/

            Toastr::success('Post Successfully Published :)','Success');
        } else {
            Toastr::info('This Post is already Published','Info');
        }
        return redirect()->back();
    }
}
