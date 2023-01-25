<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCase\SearchUseCase;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $a =  app()->make(SearchUseCase::class)->search($request->input());
        return $a;
    }
}