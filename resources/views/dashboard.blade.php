<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <div class="card bg-base-200 shadow-sm">
        <div class="card-body">
            <p>{{ __("You're logged in!") }}</p>
        </div>
    </div>
</x-app-layout>
