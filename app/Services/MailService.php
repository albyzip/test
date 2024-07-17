<?php

namespace App\Services;

use App\Mail\WelcomeFormMail;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function send($payload): Collection
    {
        Mail::to($payload['email'])->send(new WelcomeFormMail($payload));


        return Blog::query()->orderBy('created_at', 'desc')->get();
    }
}
