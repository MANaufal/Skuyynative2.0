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
$quizId = $items->id_quiz;
@endphp

<script>
    var quizId = {{ $quizId }};

    var option1 = "{{ $option1 }}";
    var option2 = "{{ $option2 }}";
    var option3 = "{{ $option3 }}";
    var option4 = "{{ $option4 }}";
    
    document.getElementById(1).innerHTML = option1;
    document.getElementById(2).innerHTML = option2;
    document.getElementById(3).innerHTML = option3;
    document.getElementById(4).innerHTML = option4;

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
            resetColor(value);
        }else{
            point = point - 3;
            document.getElementById(value).style.backgroundColor = '#ff3333';
            resetColor(value);
        }

        setTimeout(function(){
            console.log(point);
            loadDoc(quizId);
        }, 1500);
    }
</script>

