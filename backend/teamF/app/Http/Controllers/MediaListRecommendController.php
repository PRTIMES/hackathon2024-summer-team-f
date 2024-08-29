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
        // $mediaList = MediaList::fetchAll();
        // $press_release_info = $request->input('press_release_info');   press_releaseの情報をリクエストから取得
        $media_list = [
            [
                'media_kind' => 1,
                'name' => 'TechCrunch',
                'explanation' => 'Leading technology media outlet',
                'company' => 'TechCrunch Inc.',
                'department' => 'Editorial',
                'means' => 'Email'
            ],
            [
                'media_kind' => 2,
                'name' => 'The Verge',
                'explanation' => 'Popular technology news website',
                'company' => 'Vox Media',
                'department' => 'Technology',
                'means' => 'Online submission'
            ],
            [
                'media_kind' => 3,
                'name' => 'Reuters',
                'explanation' => 'International news organization',
                'company' => 'Thomson Reuters',
                'department' => 'Business News',
                'means' => 'Press release portal'
            ]
        ];
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
