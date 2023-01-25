<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request): string
    {

        $a = $request->input();
        return 'Hello World';
    }
}