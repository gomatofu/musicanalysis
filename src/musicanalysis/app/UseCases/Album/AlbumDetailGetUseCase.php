<?php
namespace App\UseCases\Album;

use App\Services\SpotifyAPIService;
use App\UseCases\Analysis\AudioFeaturesGetUseCase;
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
                $tracks[$index]=[
                    'id' => $results->items[$index]->id,
                    'disc_number' => $results->items[$index]->disc_number,
                    'name' => $results->items[$index]->name,
                    'duration_ms' => $results->items[$index]->duration_ms,
                    'url' => $results->items[$index]->external_urls->spotify,
                    'preview_url' => $results->items[$index]->preview_url];
                
                $tracksId[$index] = $results->items[$index]->id;
            }
            $features = $this->getAudioFeaturesGetUseCase()->getMultipleAudioFeatures($tracksId);
            $features = json_decode(json_encode($features->audio_features), true);

            for ($index= 0; $index < $itemsNum; $index++){

                $fruits[$index] = array_merge($tracks[$index], $features[$index]);
            }

            $a = array_merge($tracks, $features);
            

            return $tracks;

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
}