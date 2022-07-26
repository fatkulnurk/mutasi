<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? '' }} - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @livewireStyles
        @livewireScripts
        <!-- Scripts -->
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
        @vite('resources/js/app.js')

        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
              integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
    </head>
    <body class="drawer drawer-mobile w-full overflow-x-hidden">
    <input id="my-drawer" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content">
        <div class="navbar bg-base-100">
            <div class="navbar-start">
                <label tabindex="0" class="btn btn-ghost btn-circle" for="my-drawer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                </label>
            </div>
            <div class="navbar-center">
                <a href="?"
                   class="font-extrabold text-transparent text-3xl bg-clip-text bg-gradient-to-r from-info to-primary">{{ config('app.name') }}</a>
            </div>
            <div class="navbar-end">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-8 rounded-full">
                            <img src="{{ asset('images/default.png') }}"/>
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-1 shadow bg-base-100 rounded-box w-52">
                        <li>
                            <a>
                                Profile
                            </a>
                        </li>
                        <li><a>Ganti Password</a></li>
                        <hr class="my-1">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-block btn-primary btn-sm">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <header class="bg-white shadow border-b">
            <div class="w-full mx-auto py-6 px-3">
                {{ $title ?? '' }}
            </div>
        </header>
        <div class="bg-gradient-to-b from-base-100 to-base-200 ">
            <main class="w-full mx-auto min-h-screen">
                <div class="p-1">
                    @if(session('success'))
                        <div class="alert alert-success my-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('failed'))
                        <div class="alert alert-error my-3">
                            {{ session('failed') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-error my-3">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="my-3 bg-base-200 p-5">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-error">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                    <div class="font-sans text-gray-900 antialiased">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>

        <footer class="card">
            <div class="card-body text-center">
                <div class="card-actions justify-center my-5">
                    <p>
                        &copy; 2022 - {{ config('app.name') }}
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <div class="drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>
        <div class="menu bg-base-100 w-64">
            <div class="navbar w-full border-b">
                <div class="navbar-center text-center w-full text-xl">Dashboard</div>
            </div>
            <div class="w-full clear-none">
                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fa-solid fa-dashboard w-5 h-5"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.banks.index') }}">
                        <i class="fa-solid fa-money-bills w-5 h-5"></i> Kelola Bank
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.mutations.index') }}">
                        <i class="fa-solid fa-money-bills w-5 h-5"></i> Kelola Mutasi
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.apis.index') }}">
                        <i class="fa-solid fa-money-bills w-5 h-5"></i> Pengaturan Api
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-block btn-primary btn-sm">Logout</button>
                    </form>
                </li>
                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function showAlertDelete(event) {
            let text = "Are you sure you want to delete this record?";
            if (confirm(text) === true) {
                return true;
            } else {
                return false
            }
        }
    </script>
    </body>
</html>
