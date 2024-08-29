<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    protected $openai_api_key;

    /**
     * Initialize the OpenAIService with the API key from environment variables.
     */
    public function __construct()
    {
        $this->openai_api_key = env('OPENAI_API_KEY');
    }

    /**
     * @param string $media_list
     * @param string $press_release_info
     * @return array 
     */
    public function generateRecomendedMediaList($media_list, $press_release_info)
    {
        // Make a POST request to the OpenAI API to generate the explanation
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->openai_api_key,
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => "あなたはPRとメディアリーチの専門家です。プレスリリースの内容、カテゴリ、目的、種類に基づいて、適切なメディアリストを候補から選んでください。$media_list"
                ],
                [
                    'role' => 'user',
                    'content' => "プレスリリース情報: $press_release_info\n\nメディアリスト: $media_list"
                ]
            ],
        ]);
    
        // Decode the JSON response from the API
        $data = $response->json();

        return $data['choices'][0]['message']['content'] ?? '';
    }
}
