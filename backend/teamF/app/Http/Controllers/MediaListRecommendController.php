<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use App\Models\MediaList;

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
        $media_list_all = MediaList::all()->toArray();
        
        $media_list = array_map(function($media) {
            return [
                'media_kind' => $media['media_kind'],
                'media_name' => $media['media_name'],
                'media_overview' => $media['media_overview'],
                'size_published' => $media['size_published'],
            ];
        }, $media_list_all);

        // $press_release_info = $request->input('press_release_info');   press_releaseの情報をリクエストから取得

        $press_release_title = 'New AI-Powered Product Launch';
        $press_release_content = 'We are thrilled to introduce our latest AI-powered product that revolutionizes data analytics by providing real-time insights and predictive analytics.';
        $press_release_category = 'Technology';
        $press_release_purpose = 'To announce the launch of our innovative AI product and attract media coverage from leading technology outlets.';
        $press_release_kind = 'Product Announcement';

        


        $recommended_media_list = $this->openAIService->generateRecomendedMediaList($media_list, $press_release_title, $press_release_content, $press_release_category, $press_release_purpose, $press_release_kind);
        return response()->json([
            'message' => 'success',
            'data' => $recommended_media_list
        ]);
    }

}
