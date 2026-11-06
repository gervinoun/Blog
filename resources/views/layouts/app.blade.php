@extends('layouts.main')

@section('content')
    @isset($header)
        <header class="mb-6">
            {{ $header }}
        </header>
    @endisset

    {{ $slot }}
@endsection
