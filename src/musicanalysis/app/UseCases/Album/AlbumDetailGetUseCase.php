<?php
namespace App\UseCases\Album;

use App\Services\SpotifyAPIService;
use App\UseCases\Analysis\AudioFeaturesGetUseCase;
use App\UseCases\Analysis\AudioFeaturesCommonUseCase;
use Exception;

class AlbumDetailGetUseCase
{
    public function getAlbumDetail(string $albumId)
    {
        try{
            $results = $this->getSpotifyAPIService()->getAlbumDetail($albumId);

            $tracks = [];
            $tracksId=[];
            $itemsNum = count($results->items);
            for ($index= 0; $index < $itemsNum; $index++){
                $time = $this->getAudioFeaturesCommonUseCase()->millisecondsConversion($results->items[$index]->duration_ms);
                $tracks[$index]=[
                    'id' => $results->items[$index]->id,
                    'disc_number' => $index + 1,
                    'name' => $results->items[$index]->name,
                    'time' => $time,
                    'url' => $results->items[$index]->external_urls->spotify,
                    'preview_url' => $results->items[$index]->preview_url];
                
                $tracksId[$index] = $results->items[$index]->id;
            }
            $features = $this->getAudioFeaturesGetUseCase()->getMultipleAudioFeatures($tracksId);
            $features = json_decode(json_encode($features->audio_features), true);

            for ($index= 0; $index < $itemsNum; $index++){
                $key = $this->getAudioFeaturesCommonUseCase()->keyConversion($features[$index]['key']);
                $features[$index]['key'] = $key;
                $scale = $this->getAudioFeaturesCommonUseCase()->modeConversion($features[$index]['mode']);
                $features[$index]['mode'] = $scale;
                $trackFeatures[$index] = array_merge($tracks[$index], $features[$index]);
            }

            return $trackFeatures;

        }catch(Exception $exception){
            return $exception;
        }
        
    }

    private function getSpotifyAPIService():SpotifyAPIService
    {
        return app()->make(SpotifyAPIService::class);
    }

    private function getAudioFeaturesGetUseCase():AudioFeaturesGetUseCase
    {
        return app()->make(AudioFeaturesGetUseCase::class);
    }

    private function getAudioFeaturesCommonUseCase():AudioFeaturesCommonUseCase
    {
        return app()->make(AudioFeaturesCommonUseCase::class);
    }
}