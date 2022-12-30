@foreach($message as $messages)

@if($messages->sender == Auth::user()->id)
    <div class="bg-sky-400 self-end w-fit my-2 p-3 rounded-2xl rounded-br-none text-white text-lg max-w-xl">{{ $messages->message }}</div>
@else
    <div class="bg-sky-400 self-end w-fit my-2 p-3 rounded-2xl rounded-br-none text-white text-lg max-w-xl">{{ $messages->message }}</div>
@endif

@endforeach

<script>
    if(!executed) {
        var chat = document.getElementById('chatmsg');
        chat.scrollTop = chat.scrollHeight - chat.clientHeight;

        var executed = true;
    }

</script>