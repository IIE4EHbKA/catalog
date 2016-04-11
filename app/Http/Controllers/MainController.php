<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function feedback()
    {
        $feed_data = [
            'name' => Request::input('name'),
            'user_email' => Request::input('email'),
            'msg' => Request::input('message')
        ];
        Mail::send('email', $feed_data, function($message)
        {
            $message->from('feedback@xdemo.ml', 'Сайт');
            $message->to('foo@example.com', 'Джон Смит')->subject('Письмо с сайта');
        });
    }
}