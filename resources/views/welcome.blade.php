@extends('layouts.main')

@section('title', __('Home').' | '.config('app.name', 'Blog'))

@section('content')
    <section class="hero min-h-64 rounded-box bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-lg">
                <h1 class="text-4xl font-bold">{{ __('Welcome to :name', ['name' => config('app.name', 'Blog')]) }}</h1>
                <p class="py-6">{{ __('Share and discover stories from the community.') }}</p>
            </div>
        </div>
    </section>
@endsection
