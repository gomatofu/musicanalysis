<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\Artist\ArtistGetUseCase;
use App\UseCases\Artist\ArtistsAlbumsGetUseCase;

class ArtistController extends Controller
{
    public function getArtist(Request $request)
    {
        return  app()->make(ArtistGetUseCase::class)->getArtist($request->input());
    }

    public function getArtistsAlbum($id)
    {
        return  app()->make(ArtistsAlbumsGetUseCase::class)->getArtistsAlbum($id);
    }
}