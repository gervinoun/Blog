<header class="bg-base-200 shadow-sm">
    <nav class="navbar container mx-auto max-w-7xl px-4" aria-label="{{ __('Main navigation') }}">
        <div class="navbar-start">
            <a href="{{ route('home') }}" class="btn btn-ghost text-xl">{{ config('app.name', 'Blog') }}</a>
        </div>

        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')])>{{ __('Home') }}</a></li>
                <li><a href="{{ route('dashboard') }}" @class(['active' => request()->routeIs('dashboard')])>{{ __('Dashboard') }}</a></li>
                @auth
                    <li><a href="{{ route('profile.edit') }}" @class(['active' => request()->routeIs('profile.*')])>{{ __('Profile') }}</a></li>
                @endauth
            </ul>
        </div>

        <div class="navbar-end gap-2">
            <div class="hidden lg:block">
                @include('layouts.theme-selector', ['selectClass' => 'select select-bordered select-sm w-36'])
            </div>

            @guest
                <div class="hidden items-center gap-2 lg:flex">
                    <a href="{{ route('login') }}" class="btn btn-ghost">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Register') }}</a>
                </div>
            @else
                <span class="hidden text-sm lg:inline">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="hidden lg:block">
                    @csrf
                    <button type="submit" class="btn btn-ghost">{{ __('Logout') }}</button>
                </form>
            @endguest

            <details class="dropdown dropdown-end lg:hidden">
                <summary class="btn btn-ghost" aria-label="{{ __('Open navigation menu') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </summary>
                <ul class="menu dropdown-content z-10 mt-3 w-52 rounded-box bg-base-100 p-2 shadow">
                    <li class="px-2 py-1">
                        @include('layouts.theme-selector', ['selectClass' => 'select select-bordered select-sm w-full'])
                    </li>
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                    @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li><a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">{{ __('Logout') }}</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </details>
        </div>
    </nav>
</header>
