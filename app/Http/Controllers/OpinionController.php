<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OpinionFormRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\OpinionSendmail;
use Session;

class OpinionController extends Controller
{
    public function input()
    {
        return view('opinion.input');
    }

    public function postInput(OpinionFormRequest $request)
    {
        $postData = $request->all();
        return view('opinion.input', compact('postData'));
    }

    public function confirm(OpinionFormRequest $request)
    {
        $postData = $request->all();
        return view('opinion.confirm',compact('postData'));
    }

    public function result(OpinionFormRequest $request)
    {
        $postData = $request->all();
        Mail::send(new OpinionSendMail($postData));
        $request->session()->regenerateToken();
        return view('opinion.result');
    }
}
