<?php
namespace App\UseCases\Artist;

use App\Services\SpotifyAPIService;
use Exception;

class ArtistsAlbumsGetUseCase
{
    public function getArtistsAlbum(string $artistId)
    {
        try{
            $results = $this->getSpotifyAPIService()->getArtistsAlbum($artistId);

            $alubums = array();
            $itemsNum = count($results->items);
            for ($index= 0; $index < $itemsNum; $index++){
                $alubums[$index]=[
                    'id' => $results->items[$index]->id,
                    'name' => $results->items[$index]->name,
                    'release_date' => $results->items[$index]->release_date,
                    'track' => $results->items[$index]->total_tracks,
                    'url' => $results->items[$index]->external_urls->spotify,
                    'image' => $results->items[$index]->images[0]->url ?? ''];
            }
            
            return $alubums;

        }catch(Exception $exception){
            return $exception;
        }
        
    }

    private function getSpotifyAPIService():SpotifyAPIService
    {
        return app()->make(SpotifyAPIService::class);
    }
}