<?php
namespace App\UseCase;

use SpotifyWebAPI;
use Exception;

class SearchUseCase 
{
    public function search(array $requests)
    {
        try{
            // session情報作成
        $clientId = config('spotifyinfo.client-id');
        $clientSecret = config('spotifyinfo.client-secret');
        $session = new SpotifyWebAPI\Session(
            $clientId, 
            $clientSecret
        );

        // アクセストークンの取得
        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();

        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($accessToken);

        $name = $requests['name'];
        $options =[
            'limit' => 10,
        ];
        $results = $api->search($name, 'artist', $options);
        $albums = $api->getArtistAlbums("0GtBUVp1cWdIUKwm2GHTHc");
        $getArtists = $api->getArtists("0GtBUVp1cWdIUKwm2GHTHc",);
        //$tracks = $api->getAlbumTracks("1ZZYZP9zwTSsKG0GHyx1fY");

        $array = array();
        $itemsNum = count($results->artists->items);
        for ($index= 0; $index < $itemsNum; $index++){
            $array[$index]=[
                'id' => $results->artists->items[$index]->id,
                'name' => $results->artists->items[$index]->name,
                'genres' => $results->artists->items[$index]->genres[0] ?? '',
                'popularity' => $results->artists->items[$index]->popularity,
                'url' => $results->artists->items[$index]->external_urls->spotify,
                'image' => $results->artists->items[$index]->images[0]->url ?? ''];
          }
        //$a = $results->artists->items[0]->images[0]->url;
        //$array = json_decode(json_encode($name), true);
        return $array;
        }catch(Exception $exception){
            return $exception;
        }
        
    }
}