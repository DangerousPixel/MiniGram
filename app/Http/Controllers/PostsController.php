<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;
class PostsController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    
    }

    public function index() 
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));           
    }
 
    public function create () {
        return view('posts.create');
 
    }

    public function store(){
        $data = request()->validate([
            'caption' => '',
            'image' => ['required ',' image']]);

            $imagePath = request('image')->store('uploads','public');

            auth()->user()->posts()->create([
                'caption' =>$data['caption'],
                'image' => $imagePath,
            ]);

            return redirect('/profile/' . auth()->user()->id);
     }
     
     public function edit(\App\Models\Post $post) {
        //$this->authorize('update', $post);
         return view('posts.edit', compact('post'));
    }

     public function show(\App\Models\Post $post){

        return view('posts.show', compact('post'));
    }

    public function update(Post $post) {

        $data = request()->validate(['caption' => '']);
            $post->update($data);
            return redirect("/p/{$post->id}");

     }

     public function destroy($id , User $user)
     {
         DB::table('posts')->where('id',$id)->delete();
         return redirect("/")->with('destroy','.');
            }
    
}