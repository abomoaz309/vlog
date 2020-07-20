<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\message;
use App\Mail\reply_messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class messagesController extends BackEndController
{
    public function index() {
        $messages = message::paginate('5');
        return view('back-end.messages.index', compact('messages'));
    }

    public function edit($id)
    {
        $message= message::findOrFail($id);
        return view('back-end.messages.edit', compact('message'));
    }

    public function replyMessage(Request $request, $id) {
        $this->validate($request, [
            'message' => 'required'
        ]);
        $message = message::findOrFail($id);
        Mail::send(new reply_messages($message, Request('message')));
        return redirect()->route('messages.edit', $message->id);
    }

}
