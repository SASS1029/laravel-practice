@extends('layouts.app')

@section('title','Show')

@section('header')
    <h1>{{ $username }}'s Posts</h1>
@endsection 

@section('content')
    @if(count($post_titles))
        <ul>
            @foreach($post_titles as $title)
                <li>{{ $title }}</li>
                @endforeach
        </ul>
    @endif
@endsection

@section('footer')
    <i class="fab fa-facebook-f fs-4 text-muted mt-2"></i>
    <i class="fab fa-instagram fs-4 text-muted mt-2"></i>
    <i class="fab fa-twitter fs-4 text-muted mt-2"></i>
@endsection