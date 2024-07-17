<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Services\MailService;
use Illuminate\Http\JsonResponse;

class MailController extends Controller
{
    public function __invoke(MailRequest $request): JsonResponse
    {
        MailService::send($request->all());

        return response()->json([
            'success' => true,
        ]);
    }
}
