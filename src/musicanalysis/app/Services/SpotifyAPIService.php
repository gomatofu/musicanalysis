<?php
namespace App\Services;

use App\UseCase\SpotifyUseCase;

class SpotifyAPIService 
{
    private $api;
    public function __construct(SpotifyUseCase $spotify)
    {
        $this->api = $spotify->getSpotifyAccessToken();
    }
    /**
     * アーティスト名検索時の初期表示取得
     * @param string $atistName
     * @return object
     */
    public function getArtistFirstDisply(string $atistName):object
    {
        $options =[
            'limit' => 10,
        ];
        $results = $this->api->search($atistName, 'artist', $options);
        return $results;
    }

    /**
     * アーティストのアルバム情報取得
     * @param string $atistId
     * @return object
     */
    public function getArtistAlbums(string $atistId):object
    {
        $results = $this->api->getArtistAlbums($atistId);
        return $results;
    }
}