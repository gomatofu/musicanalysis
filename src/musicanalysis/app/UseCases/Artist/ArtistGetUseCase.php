<?php
namespace App\UseCases\Artist;

use App\Services\SpotifyAPIService;
use Exception;

class ArtistGetUseCase
{
    public function getArtist(array $requests)
    {
        try{
            $artistName = $requests['name'];
            $results = $this->getSpotifyAPIService()->getArtist($artistName);

            $arrtists = array();
            $itemsNum = count($results->artists->items);
            for ($index= 0; $index < $itemsNum; $index++){
                $arrtists[$index]=[
                    'id' => $results->artists->items[$index]->id,
                    'name' => $results->artists->items[$index]->name,
                    'genres' => $results->artists->items[$index]->genres[0] ?? '',
                    'popularity' => $results->artists->items[$index]->popularity,
                    'url' => $results->artists->items[$index]->external_urls->spotify,
                    'image' => $results->artists->items[$index]->images[0]->url ?? ''];
            }
            
            return $arrtists;
        }catch(Exception $exception){
            return $exception;
        }
    }

    private function getSpotifyAPIService():SpotifyAPIService
    {
        return app()->make(SpotifyAPIService::class);
    }
}