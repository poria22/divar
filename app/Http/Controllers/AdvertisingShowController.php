<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertising;
class AdvertisingShowController extends Controller
{
    public function show(Advertising $advertising)
    {
        $advertising->load('user','category');
        return view('advertising',compact('advertising'));

    }
}
