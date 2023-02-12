<?php
namespace App\UseCase;

use App\Services\SpotifyAPIService;
use Exception;

class ArtistAlbumsUseCase 
{
    public function getAlbums(string $id)
    {
        try{
            $artistId = $id;
            $results = $this->getSpotifyAPIService()->getArtistAlbums($artistId);

            $alubums = array();
            $itemsNum = count($results->items);
            for ($index= 0; $index < $itemsNum; $index++){
                $alubums[$index]=[
                    'id' => $results->artists->items[$index]->id,
                    'name' => $results->artists->items[$index]->name,
                    'genres' => $results->artists->items[$index]->genres[0] ?? '',
                    'popularity' => $results->artists->items[$index]->popularity,
                    'url' => $results->artists->items[$index]->external_urls->spotify,
                    'image' => $results->artists->items[$index]->images[0]->url ?? ''];
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