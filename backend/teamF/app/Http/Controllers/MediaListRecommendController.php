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
        $media_list = MediaList::select('media_kind', 'media_name', 'media_overview', 'size_published')->get()->toArray();

        $media_request_data = $request->input('post');
        $press_release_title = $media_request_data['title'] ?? '';
        $press_release_content = $media_request_data['content'] ?? '';
        $press_release_category = $media_request_data['category'] ?? '';
        $press_release_purpose = $media_request_data['purpose'] ?? '';
        $press_release_kind = $media_request_data['releaseKind'] ?? '';

        $recommended_media_list = $this->openAIService->generateRecomendedMediaList($media_list, $press_release_title, $press_release_content, $press_release_category, $press_release_purpose, $press_release_kind);
        return response()->json([
            'message' => 'success',
            'data' => $recommended_media_list
        ]);
    }

}
