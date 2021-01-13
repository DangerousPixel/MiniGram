@extends('layouts.app')

@section('content')
<div class="container">
<form action="/p/{{$post->id}}" enctype="form-data" method="post">
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <h1> Edit Post </h1>
            </div>
            <div class="form-group row">
                <label for="caption" class="col-md-4 col-form-label "> Post Caption </label>       
                   <input id="caption" type="text" 
                   class="form-control @error ('caption') is-invalid @enderror" 
                   name = "caption" value="{{ old('caption') ?? $post->caption }}" 
                   required autocomplete="caption" autofocus>
       
                   @error('caption')
                       <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('caption') }}</strong>
                       </span>
                   @enderror
                   </div>
                   <div class="row pt-3">
                    <button class="btn-primary"> save changes </button>
                </div>
    
        </div>
    </div>

</form>
</dev>
@endsection
