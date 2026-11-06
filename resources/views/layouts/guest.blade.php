@extends('layouts.main')

@section('content')
    <div class="mx-auto w-full max-w-md">
        <div class="card bg-base-200 shadow-xl">
            <div class="card-body">
                <a href="{{ route('home') }}" class="mx-auto mb-2">
                    <x-application-logo class="h-16 w-16 fill-current text-base-content/60" />
                </a>

                {{ $slot }}
            </div>
        </div>
    </div>
@endsection
