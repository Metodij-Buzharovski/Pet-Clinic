@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blogs" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <p>{{$post->body}}</p>
                <hr>
                @if(auth()->user()->role=='admin' || auth()->id()==$post->user_id)
                    <a href="/blogs/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                @endif
                <br><br>
                @if(auth()->user()->role=='admin' || auth()->id()==$post->user_id)
                    <form id="delete-frm" action="/blogs/{{ $post->id }}/delete" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger">Delete Post</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
