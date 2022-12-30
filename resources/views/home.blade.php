<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/functions.js') }}" type="text/javascript"></script>
</head>

<style>
    .background-animate {
        background-size: 400%;

        -webkit-animation: AnimationName 8s ease infinite;
        -moz-animation: AnimationName 8s ease infinite;
        animation: AnimationName 8s ease infinite;
    }

    @keyframes AnimationName {
        0%,
        100% {
        background-position: 0% 50%;
        }
        50% {
        background-position: 100% 50%;
        }
    }
</style>

<body>
    @extends('layouts.navbar')
    @section('content')


  
    <div class = "py-[70px]">

        <div class="float-left w-2/3">
            <div class="p-8 pt-2">
                <div id="greet" class="font-bold text-4xl p-4"></div>
            </div>
        
            <div class="px-12 py-3">
                <div class="relative rounded-3xl h-40 w-56 text-white font-bold text-2xl bg-gradient-to-tr from-sky-400 to-green-300 background-animate inline-block">
                    <div id="btn" class="absolute bottom-0 left-2 p-4">Daily<br>Vocabulary</div>
                </div>
        
                <div class="relative rounded-3xl h-40 w-56 text-white font-bold text-2xl bg-gradient-to-tl from-red-500 to-orange-100 background-animate inline-block mx-10">
                    <div class="absolute bottom-0 left-2 p-4">Continue<br>Practice</div>
                </div>
            </div>

            <div class="py-9 px-12">
                <div class="relative rounded-3xl h-60 w-11/12 bg-gradient-to-r from-amber-500 via-yellow-300 to-red-500 background-animate text-white">
                    <div class="absolute font-bold text-3xl left-11 top-6">
                        Your Rank
                    </div>
                    <div class=>
                        
                    </div>
                    <a href="{{ url('quiz') }}">
                        <div class="absolute bottom-7 right-10 px-14 pt-2 pb-4 bg-slate-700 font-bold rounded-2xl text-4xl">
                            Play
                        </div>
                    </a>
                </div>
            </div>
        </div>  

        <div style="background-color:#F1F1F1" class="relative m-0 float-right h-[90%] w-[32%]">
            <div class="text-center w-full font-bold text-3xl p-3">Leaderboard</div>
            <table class="table-fixed w-full m-4">
                  <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                  </tr>
            </table>
            <div class="rounded-lg bg-white mx-9 my-7 p-2 bottom-0 absolute">
                <div class="font-bold text-xl">Competitive Mode</div>
                Top 5 will rank up to the next rank. Rank reset monthly, and rank placement is decided daily. Bottom 40 players will be demoted to the previous rank.</div>
        </div>
        @php

        @endphp



    </div>

</body>

<script>
    var objDate = new Date();
    var currentTime = objDate.getHours();

    if(rank == "bronze"){
        document.getElementById("ranking").style.color = "#cb793e";
    }else if(rank == "silver"){
        document.getElementById("ranking").style.color = "#CBCBCB";
    }else if(rank == "gold"){
        document.getElementById("ranking").style.color = "#FFFB25";
    }

    if(currentTime >= 4 && currentTime <= 12){
        document.getElementById("greet").innerHTML = "Good Morning";
    } else if(currentTime >= 12 && currentTime <= 18){
        document.getElementById("greet").innerHTML = "Good Afternoon";
    } else {
        document.getElementById("greet").innerHTML = "Good Evening";
    }
</script>
@stop