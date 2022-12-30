<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        $friendlist = $friendlist= DB::table('relationship')
        ->select('name', 'friend_id', 'user_id', 'relationship_id', 'status')
        ->join('users', 'users.id', '=', 'relationship.friend_id')
        ->where('user_id', '=', Auth::user()->id)
        ->get();

        return view('chat.index', ['friendlist' => $friendlist]);
    }

    public function chats($id){
        $friendlist = $friendlist= DB::table('relationship')
        ->select('name', 'friend_id', 'user_id', 'relationship_id', 'status')
        ->join('users', 'users.id', '=', 'relationship.friend_id')
        ->where('user_id', '=', Auth::user()->id)
        ->get();

        $message = DB::table('chat')
        ->where('relationship_id', '=', $id)
        ->orderBy('chat_id', 'asc')
        ->get();

        return view('chat.chat', ['message' => $message], ['friendlist' => $friendlist]);
    }

    public function addFriend($id){
        DB::table('relationship')
        ->insert([
            'user_id' => Auth::user()->id,
            'friend_id' => $id,
            'status' => 0
        ]);
    }

    public function confirmFriend($id){
        DB::table('relationship')
        ->where('relationship_id', '=', $id)
        ->update([
            'status' => 1
        ]);
    }

    public function findFriend(){
        $id = Auth::user()->id;

        $findFriend = DB::table('relationship')
        ->where('user_id', '!=', $id)
        ->where('relationship_id', '!=', $id)
        ->get();
    }

    public function getMessage($id){
        $message = DB::table('chat')
        ->where('relationship_id', '=', $id)
        ->orderBy('chat_id', 'asc')
        ->get();

        return view('chat.getMessage', ['message' => $message]);
    }

    public function sendChat(Request $request, $id){
        $message = $request->input('message');

        $affected = DB::table('chat')
        ->insert([
            'message' => $message,
            'sender' => Auth::user()->id,
            'relationship_id' => $id
        ]);
        
        ?>
        <script>
            loadMessage(1);
        </script>
        <?php

        return redirect()->back();
    }
}

?>
<script>
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
    }, 100)

    executed = false;
    }
</script>
<?php
