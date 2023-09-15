@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Our Blog!</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    <div class="col-4">
                        <p>Create new Post</p>
                        <a class="btn btn-primary btn-sm" href="/blogs/create">Add Post</a>
                    </div>
                </div>
                @if(count($posts)==0)
                    <p class="text-warning">No blog Posts available</p>
                @endif
                    @foreach($posts as $post)
                        <ul>
                            <li><a href="/blogs/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                        </ul>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
