<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class OpenAIController extends Controller
{
    protected $videoSearchService;
    protected $openAIService;
    
    /**
     *
     * @param OpenAIService $openAIService
     */
    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;  
    }

    /**
     * Search for YouTube videos containing the specified keyword in their subtitles.
     *
     * @param string $keyword The search keyword
     * @return \Illuminate\View\View
     */
    public function searchVideosByKeyword($keyword)
    {
        // Perform the search using the VideoSearchService
        $videos = $this->videoSearchService->search($keyword);

        foreach ($videos as &$video) {
            // Generate explanations for each video using OpenAIService
            $video['explanation'] = $this->openAIService->generateExplanation($video['snippet']['title'], $video['snippet']['description']);
        }

        // Return the view with search results
        return response()->json([
            'message' => 'success',
            'data' => [
            'id' => 1, 
            'name' => 'Andy'
            ]
        ]);
    }
}
