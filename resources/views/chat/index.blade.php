<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/functions.js') }}" type="text/javascript"></script>
</head>

<style>
    /* Hide scrollbar for Chrome, Safari and Opera */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .no-scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
</style>

<body class="h-full bg-gray-100">
@extends('layouts.navbar')
@section('content')

    <div class="py-20">
        <div class="w-1/4 m-0 h-[88%] overflow-x-hidden overflow-y-auto float-left no-scrollbar">
            <div class="bg-white p-5 px-7 w-full h-24">
                <p class= "font-bold text-3xl">Chat</p>
                <a class="float-right" onclick="">Add friend</a>
            </div>

            <div id = "friendlist">
            @foreach($friendlist as $friend)
            <div class="bg-white w-full h-[76px] my-3 hover:bg-gray-300">
                <p class="p-2 px-6 text-xl hover:cursor-pointer" onclick="loadMessage({{ $friend->relationship_id }})">{{ $friend->name }}</p>
                <p class="rounded-full text-sm border-black border-2 w-fit px-2 float-left ml-5 mx-3">English</p>
                <p class="text-sm border-black border-2 w-fit px-2 float-left">English</p>

                @php
                $friendid = $friend->relationship_id
                @endphp

            </div>

            @endforeach
            </div>
        </div>

        @if ($friendlist->isEmpty())
            @php
            $friendid = 0;
            @endphp
            @endif

        <form method="post" action="{{ route('sendChat', $friendid)}}" onsubmit="loadMessage({{ $friendid }})" autocomplete="off">
            @csrf
        <div class="relative float-right w-[74%] m-0 h-[87%]">
            <div class="bg-sky-400 w-full p-3 h-24 text-white">
                <div class="float-right text-sky-400 font-bold bg-white rounded-full p-2 text-xl">Daily Topic</div>
                <div class="float-left top-0 font-bold text-[20px] mx-1">joe</div>
                <br>
                <br>
                <div class="float-left bottom-0 text-sm rounded-full border-white border-4 px-2">English</div>
                <div class="float-left bottom-0 text-sm border-white border-4 px-2 mx-3">English</div>
            </div>
            
            <div id="chatmsg" class="p-1 flex flex-col h-[75%] overflow-x-hidden overflow-y-auto">
                
            </div>

            <input type="text" id="message" name="message" class="absolute w-[90%] rounded-3xl border-none bottom-0 p-4">
            <button class="absolute w-[10%] rounded-3xl border-none p-4 bottom-0 right-0" autocomplete="off">submit</button>
        </form>
        </div>
    </div>
</body>

<script>
    var chatId = {{ $friendid }}
    console.log(chatId);

    afterLoad(chatId);

    var executed = false;

    function scrollDown(){
        var chat = document.getElementById('chatmsg');
        chat.scrollTop = chat.scrollHeight - chat.clientHeight;

        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    }
</script>

@endsection