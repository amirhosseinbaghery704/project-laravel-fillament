<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use View;

class templatecontroller extends Controller
{
    public function index(){
        $posts = Post::where('status' , true)
            ->with('user' , 'categories')
            ->orderBy('created_at' , 'DESC')
            ->paginate(8);

        return view('template.home' , [
            'posts' => $posts
        ]);
    }  

        public function about(){
        return view('template.about');
    }  

        public function login(){
        return view('template.login');
    }

    public function single( int $id )
    {
        // $posts = post::where('id',$id)
        // ->where('status',true)
        // // ->with(['user','categories','comments'])
        // ->firstOrFail();

        $posts = Post::with('user')
                ->find($id);

        return View::make('template.single',[
            'posts'=>$posts
        ]);
    }

    public function blog()
    {
        $posts = Post::where('status',true)
            ->with('categories','user')
            ->orderBy('created_at','DESC')
            ->paginate(9);
            // $popularCategories=Category::withCount('posts')
            // ->orderBy('posts_count', 'desc')
            // ->take(5)
            // ->get();

         return View::make('template.blog',[
            'posts'=> $posts,
            // 'popularCategories'=>$popularCategories,
         ]);
    }
    public function search(Request $request , Post $post)
    {
        if(! filled($request->word))
            return Redirect()->route('home');

        $word = $request->word;
        $posts = Post::where(function($query) use($word){
            $query->where('title' , 'like' , "%{$word}%")
                ->orWhere('content' , 'like' , "%{$word}%");
        })
        ->paginate(5)
        ->withQueryString();

        return view('template.search' , [
            'posts' => $posts
        ]);
    }
}
