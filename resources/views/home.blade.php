@extends('layouts.app')

@section('content')
<div class="dashboard shadow-lg rounded-lg border border-gray-300">
    <div class="p-6">
        <div class="pb-3 border-b border-gray-300 ">
            <h3 class="font-medium leading-tight text-3xl mt-0">
                {{ __('My blogs list') }}
            </h3>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <blog :blogs="{{ $myBlogs }}" default-page="{{ route('welcome') }}" editable></blog>
    </div>
</div>
@endsection
