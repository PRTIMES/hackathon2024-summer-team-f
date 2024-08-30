<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use App\Models\MediaList;
use Illuminate\Http\JsonResponse;

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
     * @return JsonResponse
     */
    public function createMediaList(Request $request): JsonResponse
    {
        $media_list_all = MediaList::all()->toArray();
        
        $media_list = array_map(function($media) {
            return [
                'media_kind' => $media['media_kind'],
                'media_name' => $media['media_name'],
                'media_overview' => $media['media_overview'],
                'size_published' => $media['size_published'],
            ];
        }, $media_list_all);

        $mediaRequestData = $request->input('post');
        $press_release_title = $mediaRequestData['title'] ?? '';
        $press_release_content = $mediaRequestData['content'] ?? '';
        $press_release_category = $mediaRequestData['category'] ?? '';
        $press_release_purpose = $mediaRequestData['purpose'] ?? '';
        $press_release_kind = $mediaRequestData['releaseKind'] ?? '';


        $recommended_media_list = $this->openAIService->generateRecomendedMediaList($media_list, $press_release_title, $press_release_content, $press_release_category, $press_release_purpose, $press_release_kind);
        return response()->json([
            'message' => 'success',
            'data' => $recommended_media_list
        ]);
    }

}
