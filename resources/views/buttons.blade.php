@extends('layouts.main')

@section('title', __('Buttons').' | '.config('app.name', 'Blog'))

@section('content')
    <section class="space-y-4">
        <h1 class="text-2xl font-bold">{{ __('Button comparison') }}</h1>

        <div class="flex flex-wrap items-center gap-4">
            <button type="button" class="btn btn-primary">{{ __('Bootstrap primary') }}</button>
            <button
                type="button"
                class="rounded bg-blue-600 px-4 py-2 text-white transition-colors hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                {{ __('Tailwind primary') }}
            </button>
        </div>
    </section>
@endsection
