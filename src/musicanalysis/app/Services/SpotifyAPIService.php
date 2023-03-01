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
     * @param string $artistName
     * @return object
     */
    public function getArtist(string $artistName):object
    {
        $options =[
            'limit' => 10,
        ];
        $results = $this->api->search($artistName, 'artist', $options);
        return $results;
    }

    /**
     * アーティストのアルバム情報取得
     * @param string $artistId
     * @return object
     */
    public function getArtistsAlbum(string $artistId):object
    {
        $options =[
            'limit' => 50,
        ];
        $results = $this->api->getArtistAlbums($artistId,$options);
        return $results;
    }

    /**
     * アルバムの詳細情報取得(曲名)
     * @param string $albumId
     * @return object
     */
    public function getAlbumDetail(string $albumId):object
    {
        $options =[
            'limit' => 50,
        ];
        $results = $this->api->getAlbumTracks($albumId,$options);
        return $results;
    }

    /**
     * 曲の分析情報取得
     * @param array $tracksId
     * @return object
     */
    public function getMultipleAudioFeatures(array $tracksId):object
    {
        $results = $this->api->getMultipleAudioFeatures($tracksId);

        return $results;
    }
}