<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use Illuminate\Http\Request;
use App\Models\Category;

class LandingController extends Controller
{
    public function index()
    {
        $categories=Category::with('children')->get();

        $advertisings=Advertising::with(['user','category'])->orderBy('created_at','desc')->paginate(5);
        return view('landing',compact(['advertisings','categories']));
    }

    public function search(Request $request)
    {
        $categories=Category::with('children')->get();

        if(isset($request->new)){
            $advertisings=Advertising::orderby('created_at','desc')->get();
        }
        if(isset($request->old)){
            $advertisings=Advertising::orderby('created_at','asc')->get();
        }
        if ($request->category){
            $advertisings=Advertising::where('category_id','=',$request->category)->get();
        }

        return view('landing',compact(['advertisings','categories']));

    }


}
