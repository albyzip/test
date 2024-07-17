<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Http\Requests\TelegramRequest;
use App\Integrations\TelegramService;
use App\Services\MailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function __invoke(TelegramRequest $request, TelegramService $telegramService): JsonResponse
    {
        $telegramService->sendMessageToChat($request->get('message'));

        return response()->json([
            'success' => true,
        ]);
    }
}
