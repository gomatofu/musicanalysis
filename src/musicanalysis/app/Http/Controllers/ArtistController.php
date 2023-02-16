<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\Artist\ArtistGetUseCase;
use App\UseCases\Artist\ArtistsAlbumGetUseCase;

class ArtistController extends Controller
{
    public function getArtist(Request $request)
    {
        return  app()->make(ArtistGetUseCase::class)->getArtist($request->input());
    }

    public function getArtistsAlbum($id)
    {
        return  app()->make(ArtistsAlbumGetUseCase::class)->getArtistsAlbum($id);
    }
}