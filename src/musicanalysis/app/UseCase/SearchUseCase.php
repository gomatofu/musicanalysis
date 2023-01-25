<?php
namespace App\UseCase;

use SpotifyWebAPI;

class SearchUseCase 
{
    public function search(array $request)
    {
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

        $name = $request['name'];
        $results = $api->search($name, 'artist');
        $albums = $api->getArtistAlbums("0GtBUVp1cWdIUKwm2GHTHc");
        $tracks = $api->getAlbumTracks("1ZZYZP9zwTSsKG0GHyx1fY");

        $name = $results->artists->items[0]->images[0]->url;
        return $name;
    }
}