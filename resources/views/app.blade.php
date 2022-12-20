<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/functions.js') }}" type="text/javascript"></script>
</head>

<body>
    <div class="grid place-items-center h-screen">

        <div class="relative h-full w-full">
            <div id="countdown" class="absolute top-0 right-0 font-bold text-5xl m-12">60</div>
        </div>

        <div id="nav">
        
            <div class="font-bold text-3xl text-center">
                @foreach($quiz as $items)
                {{ $items->content }}
                @endforeach
            </div>

            @php
            $correct = $items->answer;
            $option1 = $items->option1;
            $option2 = $items->option2;
            $option3 = $items->option3;
            $option4 = $items->option4;
            @endphp
        </div>

        <div id="answer" class="grid grid-rows-2 grid-flow-col gap-16">
            <button onclick="select(this.value)" id=1 value=1 class="rounded-lg bg-sky-500 text-white p-2 w-72 font-bold text-lg"></button>
            <button onclick="select(this.value)" id=2 value=2 class="rounded-lg bg-sky-500 text-white p-2 w-72 font-bold text-lg"></button>
            <button onclick="select(this.value)" id=3 value=3 class="rounded-lg bg-sky-500 text-white p-2 w-72 font-bold text-lg"></button>
            <button onclick="select(this.value)" id=4 value=4 class="rounded-lg bg-sky-500 text-white p-2 w-72 font-bold text-lg"></button>
        </div>

        <button id="reload" onclick="resetDelay()" style="background-color: #D96480" class="rounded-lg text-white font-bold p-3 w-44 text-3xl">Skip</button>

        <div id="progress" class="absolute bottom-0 bg-white w-full">
            <div id="bar" class="bottom-0 bg-blue-300 absolute w-1 h-3">
            </div>
        </div>
    </div>
</body>

<script>
    //print options
    var option1 = "{{ $option1 }}";
    var option2 = "{{ $option2 }}";
    var option3 = "{{ $option3 }}";
    var option4 = "{{ $option4 }}";

    document.getElementById(1).innerHTML = option1;
    document.getElementById(2).innerHTML = option2;
    document.getElementById(3).innerHTML = option3;
    document.getElementById(4).innerHTML = option4;
    console.log(option1, option2, option3, option4);

    //selection
    var delay = 2000;
    var lastClick = 0;
    var point = 0;
    var correctAns = {{ $correct }};
    function select(value){
        if(lastClick >= (Date.now() - delay)){
            return;
        }
        
        lastClick = Date.now();

        moveProgressBar();

        if(value == correctAns){
            point = point + 4;
            document.getElementById(value).style.backgroundColor = '#00d41c';
            resetColor(value);
        }else{
            point = point - 2;
            document.getElementById(value).style.backgroundColor = '#ff3333';
            resetColor(value);
        }

        setTimeout(function(){
            console.log(point);
            loadDoc();
        }, 1500);
    }

    function resetColor(value){
        setTimeout(function(){
            document.getElementById(value).style.backgroundColor = '#0ea5e9'
        }, 1500);
    }

    function resetDelay(){
        if(lastClick >= (Date.now() - delay)){
            return;
        } else {
            loadDoc();
        }
    }

    //progressbar
    var progress = document.getElementById("progress")
    var elem = document.getElementById("bar");

    var progressCount = 0;
    function moveProgressBar(){
        if(progressCount == 0){
            progressCount = 1;
            var width = 1;
            var id = setInterval(frame, 15);
            function frame(){
                if (width >= 100){
                    elem.style.width = 0;
                    clearInterval(id);
                    progressCount = 0;
                } else {
                    width++;
                    elem.style.width = width + "%";
                }
            }
        }
    }


    //timer
    var timeleft = 59;
    var timer = setInterval(function(){
        if(timeleft <= -1){
            clearInterval(timer);
        } else{
            document.getElementById("countdown").innerHTML = timeleft;
        }
        timeleft -= 1;
    }, 1000);

</script>



