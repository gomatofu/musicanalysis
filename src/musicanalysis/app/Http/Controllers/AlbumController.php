<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\Album\AlbumDetailGetUseCase;

class AlbumController extends Controller
{
    public function getAlbumDetail($id)
    {
        return  app()->make(AlbumDetailGetUseCase::class)->getAlbumDetail($id);
    }
}