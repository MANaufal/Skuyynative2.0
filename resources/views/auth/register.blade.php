{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
    </div>
    </form>
</x-guest-layout> --}}


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


<body>
    <div class="shadow-2xl h-full absolute w-1/3">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}">
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

                <div class="text-center font-bold text-3xl pt-8 py-6">
                    Sign Up
                </div>

                <div class="py-4">
                    <label class="float-left font-bold text-lg pb-3" for="name">Username</label><br>
                    <input class="rounded-full bg-gray-200 border-none w-full" type="text" id="name" name="name"/>
                </div>

                <div class="py-4">
                    <label class="float-left font-bold text-lg pb-3" for="email">Email</label><br>
                    <input class="rounded-full bg-gray-200 border-none w-full" type="email" id="email" name="email"/>
                </div>

                <div class="py-4">
                    <label class="float-left font-bold text-lg pb-3" for="password">Password</label><br>
                    <input class="rounded-full bg-gray-200 border-none w-full" type="password" id="password" name="password"/>
                </div>

                <div class="py-4">
                    <label class="float-left font-bold text-lg pb-3" for="password_confirmation">Confirm Password</label><br>
                    <input class="rounded-full bg-gray-200 border-none w-full" type="password" id="password_confirmation" name="password_confirmation"/>
                </div>

                <div class="py-11">
                    <button class="text-center bg-slate-800 text-2xl text-white font-bold w-full h-16">Register</button>
                </div>
            </div>          
        </form>
    </div> 
</body>