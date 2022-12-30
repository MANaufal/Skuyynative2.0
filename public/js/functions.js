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

function loadMessage(chatId){

    setInterval(function(){
            
        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url:"getMessage" + '/' + chatId,
            type:'get',
            data:{
                CSRF_TOKEN
            },
            success: function(data){
                $('#chatmsg').html(data)
            }
        })

        console.log('updated');

    }, 1000)

    executed = false;

    var sentChatid = chatId;
}

function afterLoad(chatId){
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url:"getMessage" + '/' + chatId,
        type:'get',
        data:{
            CSRF_TOKEN
        },
        success: function(data){
            $('#chatmsg').html(data)
        }
    })

    loadMessage(chatId);
}

function setPoint(point) {
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url:"postPoint" + '/' + point,
        type:'get',
        data:{
            CSRF_TOKEN
        }
    })
}

function preventLeaving(){
    if(timeleft > 0){
        window.onbeforeunload = function(){
            return 'Leaving before the times run out will result in penalty.'
        }
    }
}