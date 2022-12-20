<div class="font-bold text-3xl text-center p-12">
    @foreach($quiz as $items)
    {{ $items->content }}
    @endforeach
</div>

@php
$correct = $items->answer;
@endphp

<div id="answer" class="grid grid-rows-2 grid-flow-col gap-16">
    <button onclick="select(this.value)" id=1 value=1 class="rounded-lg bg-sky-500 text-white p-2 w-72 font-bold text-lg">{{ $items->option1 }}</button>
    <button onclick="select(this.value)" id=2 value=2 class="rounded-lg bg-sky-500 text-white p-2 w-72 font-bold text-lg">{{ $items->option2 }}</button>
    <button onclick="select(this.value)" id=3 value=3 class="rounded-lg bg-sky-500 text-white p-2 w-72 font-bold text-lg">{{ $items->option3 }}</button>
    <button onclick="select(this.value)" id=4 value=4 class="rounded-lg bg-sky-500 text-white p-2 w-72 font-bold text-lg">{{ $items->option4 }}</button>
</div>

<script>
    var delay = 2000;
    var lastClick = 0;
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
        }else{
            point = point - 2;
            document.getElementById(value).style.backgroundColor = '#ff3333';
        }

        setTimeout(function(){
            console.log(point);
            loadDoc();
        }, 1500);
    }
</script>

