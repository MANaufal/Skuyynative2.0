{{-- <body>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="shadow-md w-1/3 h-full absolute bg-">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="name" :value="__('Username')" />
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" :value="__('Password')" />

                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button class="ml-3">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</body> --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/functions.js') }}" type="text/javascript"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap');

    .title{
        font-family: 'Josefin Sans', sans-serif;
    }
    
    .centerize{
        margin: auto;
        width: 65%;
        padding: 10px;
    }
</style>

<body class="overflow-hidden">
    <div class="shadow-2xl h-full absolute w-1/3">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="centerize">

                <div class="flex flex-wrap justify-center pt-3">
                    <div class="object-fit w-[50px] h-[50px]">
                        <img
                            src="/img/logo1.png"
                            alt=""
                        />
                    </div>
                </div>
                <br>
                <h1 class="title font-bold text-center text-2xl">SkuyyNative</h1>

                <div class="text-center font-bold text-[40px] pt-8 py-6">
                    Log in
                </div>

                <div class="py-4">
                    <label class="float-left font-bold text-lg pb-3" for="name">Username</label><br>
                    <input class="rounded-full bg-gray-200 border-none w-full p-3 px-6" type="text" id="name" name="name"/>
                </div>

                <div class="py-4">
                    <label class="float-left font-bold text-lg pb-3" for="password">Password</label><br>
                    <input class="rounded-full bg-gray-200 border-none w-full p-3 px-6" type="password" id="password" name="password"/>
                </div>

                <div class="py-11">
                    <button class="text-center bg-slate-800 text-2xl text-white font-bold w-full h-16">Log in</button>
                </div>
            </div>          
        </form>
    </div> 
</body>
