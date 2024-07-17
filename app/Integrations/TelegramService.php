<?php

namespace App\Integrations;

use Illuminate\Support\Facades\Http;

class TelegramService
{

    protected string $apiUrl;
    protected string $token;
    protected string $chatId;

    public function __construct()
    {
        $this->token = env('TELEGRAM_BOT_TOKEN');
        $this->chatId = env('TELEGRAM_CHAT_ID');
        $this->apiUrl = "https://api.telegram.org/bot{$this->token}/";
    }

    public function sendMessageToChat( string $message): array
    {
        $response = Http::post("{$this->apiUrl}sendMessage", [
            'chat_id' => $this->chatId,
            'text' => $message,
        ]);

        return $response->json();
    }

}
