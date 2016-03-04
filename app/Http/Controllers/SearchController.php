<?php

namespace App\Http\Controllers;

use App\OpenData;
use App\OpenDataPassport;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Получение "наборов данных"
        $data['datasets'] = OpenDataPassport::orderBy('idOpenDataPassport', 'ASC')->get();

        return view('search.index', $data);
    }
}