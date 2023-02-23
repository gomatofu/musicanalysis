<?php
namespace App\UseCases\Analysis;

use App\Services\SpotifyAPIService;
use Exception;

class AudioFeaturesGetUseCase
{
    public function getMultipleAudioFeatures(array $tracksId)
    {
        try{
            $features = $this->getSpotifyAPIService()->getMultipleAudioFeatures($tracksId);

            return $features;

        }catch(Exception $exception){
            return $exception;
        }
        
    }

    private function getSpotifyAPIService():SpotifyAPIService
    {
        return app()->make(SpotifyAPIService::class);
    }
}