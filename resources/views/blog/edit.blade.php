@extends('layouts.app')

@section('content')
    <div class="dashboard shadow-lg rounded-lg border border-gray-300">
        <create-blog action-route="{{ route('blog-update', $blog->id) }}" :blog="{{ $blog }}"></create-blog>
    </div>
@endsection
