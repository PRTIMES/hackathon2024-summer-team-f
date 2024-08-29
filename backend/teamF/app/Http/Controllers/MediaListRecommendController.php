<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OpenAIService;
use Illuminate\Http\Request;

class MediaListRecommendController extends Controller
{
    protected $openAIService;
    
    /**
     * @param OpenAIService $openAIService
     */
    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;  
    }

    /**
     * @param Request $request
     */
    public function createMediaList(Request $request)
    {
        // $mediaList = MediaList::fetchAll();     　　　　　　　　　　　　   ここでdbからメディアリストを取得する
        // $press_release_info = $request->input('press_release_info');   press_releaseの情報をリクエストから取得

        var_dump($this->openAIService->generateRecomendedMediaList('media_list', 'press_release_info'));
        // return response()->json([
        //     'message' => 'success',
        //     'data' => [
        //     'id' => 1, 
        //     'name' => 'Andy'
        //     ]
        // ]);
    }

}
