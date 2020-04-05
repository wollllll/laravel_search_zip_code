<?php

namespace App\Http\Controllers;

use App\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ZipCodeController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function search(Request $request)
    {
        $result = ZipCode::where('first_code', Arr::get($request, 'first_code'))
            ->where('last_code', Arr::get($request, 'last_code'))
            ->first();

        return response($result);
    }
}
