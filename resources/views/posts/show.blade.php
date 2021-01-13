@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-8">
        <img src="/storage/{{$post->image}}" class="w-100">
        <small style="opacity: 0.5" > posted on {{$post->created_at}} </small>
       </div>
        <div class="col-4">
           <div>
                <div class="d-flex align-items-center">
                   <div class="pr-3">
                       <img src="{{ $post->user->profile->profileImage() }}" 
                       class="rounded-circle w-100" style="max-width: 40px;">
                   </div>

                    <div class="font-weight-bold">
                        
                        <a href="/profile/{{$post->user->id}}">
                        <span class="text-dark">{{$post->user->username}}</span></a><br> 
                       
                        <a href="/p/{{$post->id}}/edit">Edit Post</a>
                        ||
                        <a href="/p/{{$post->id}}/destroy" onclick="return confirm('Are you sure?')">Delete Post</a>
                        
                        
                    </div>
                </div>

            </div>
                 <hr> 
                 <p><span class="font-weight-bold">
                     <a href="/profile/{{$post->user->id}}">
                    <span class="text-dark">{{$post->user->username}}</span></a>
                    </span> {{$post->caption}}</p>
        </div>
    </div>
</div>


@endsection
