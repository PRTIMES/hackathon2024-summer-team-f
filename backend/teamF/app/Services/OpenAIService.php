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
     * @param array $media_list
     * @param string $press_release_title
     * @param string $press_release_content
     * @param string $press_release_category
     * @param string $press_release_purpose
     * @param string $press_release_kind
     * @return array 
     */
    public function generateRecomendedMediaList(array $media_list, string $press_release_title, string $press_release_content, string $press_release_category, string $press_release_purpose, string $press_release_kind): array
    {
        $media_list_json = json_encode($media_list);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->openai_api_key,
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => "あなたはPRとメディアリーチの専門家です。プレスリリースのtitle、内容、カテゴリ、目的、種類に基づいて、適切なメディアリストを以下の候補から選び、出力フォーマットに従って出力してください。注意点：適切なメディアが存在しない場合にも、必ず候補の中からメディアを選んでください```$media_list_json```\n\n出力フォーマット: \n [{\"media_kind\":\"media_kind1\",\"media_name\":\"media_name1\",\"media_overview\":\"media_overview1\",\"size_published\":10},{\"media_kind\":\"media_kind2\",\"media_name\":\"media_name2\",\"media_overview\":\"media_overview2\",\"size_published\":20}, ... ]"
                ],
                [
                    'role' => 'user',
                    'content' => "title: $press_release_title\n\n内容: $press_release_content\n\nカテゴリ: $press_release_category\n\n目的: $press_release_purpose\n\n種類: $press_release_kind"
                ]
            ],
        ]);
    
        // Decode the JSON response from the API
        $data = $response->json();
        $recomended_media_list = json_decode($data['choices'][0]['message']['content'], true) ?? [];
        
        return $recomended_media_list;
    }
}
