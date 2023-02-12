<?php
namespace App\UseCase;

use SpotifyWebAPI;

class SpotifyUseCase 
{
    /**
     * セッション情報作成
     * @return 
     */
    private function createSpotifySession()
    {
        $clientId = config('spotifyinfo.client-id');
        $clientSecret = config('spotifyinfo.client-secret');
        $session = new SpotifyWebAPI\Session(
            $clientId, 
            $clientSecret
        );

        return $session;
    }

    /**
     * アクセストークンの取得
     * @return SpotifyWebAPISpotifyWebAPI
     */
    public function getSpotifyAccessToken()
    {
        $session = $this->createSpotifySession();
        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();

        $api = new SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($accessToken);

        return $api;

    }
}