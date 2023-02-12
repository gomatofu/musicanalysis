<?php
namespace App\Services;

use App\UseCases\Spotify\SpotifyUseCase;

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
    public function getArtist(string $atistName):object
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
    public function getArtistsAlbum(string $atistId):object
    {
        $options =[
            'include_groups' => 'album',
            'limit' => 50,
        ];
        $results = $this->api->getArtistAlbums($atistId,$options);
        return $results;
    }
}