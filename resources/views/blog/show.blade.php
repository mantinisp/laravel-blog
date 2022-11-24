@extends('layouts.app')

@section('content')
    <div class="dashboard shadow-lg rounded-lg border border-gray-300">
        @if (Auth::user())
            <single-blog
                :blog="{{ $blog }}"
                default-page="{{ route('welcome') }}"
                edit-blog-route="{{ route('blog-edit', $blog->id) }}"
                create-comment-route="{{ route('create-blog-comment') }}"
                :user="{{ Auth::user() }}"
            ></single-blog>
        @else
            <single-blog
                :blog="{{ $blog }}"
                default-page="{{ route('welcome') }}"
                edit-blog-route="{{ route('blog-edit', $blog->id) }}"
                create-comment-route="{{ route('create-blog-comment') }}"
            ></single-blog>
        @endif
    </div>
@endsection
