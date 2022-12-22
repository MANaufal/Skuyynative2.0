var timeleft = 60;

function countdown(element){
    var timer = setInterval(function(){
        if(timeleft <= -1){
            clearInterval(timer);
        } else{
            document.getElementById(element).innerHTML = timeleft;
        }
        timeleft -= 1;
    }, 1000);
}

function loadDoc(quizId) {
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url:"fetchQuiz" + '/' + quizId,
        type:'get',
        data:{
            CSRF_TOKEN
        },
        success: function(data){
            $('#nav').html(data)
        }
    })
}

function startTimer(){
    var timeleft = 60;
    
    var timer = setInterval(function(){
        if(timeleft <= -1){
            clearInterval(timer);
        } else{
            document.getElementById("countdown").innerHTML = timeleft;
        }
        timeleft -= 1;
    }, 1000);
}