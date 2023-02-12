<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCase\ArtistFirstDisplyUseCase;
use App\UseCase\ArtistAlbumsUseCase;

class SearchController extends Controller
{
    public function getlist(Request $request)
    {
        return  app()->make(ArtistFirstDisplyUseCase::class)->getlist($request->input());
    }

    public function getAlbums($id)
    {
        return  app()->make(ArtistAlbumsUseCase::class)->getAlbums($id);
    }
}