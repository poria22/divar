<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use App\Models\Category;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisings=Advertising::with('user')->orderBy('id','desc')->paginate(4);
        return view('panel/Advertisings/index',compact('advertisings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('panel/advertisings/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$request->validate([
            'title'=>['string','required','max:255'],
            'content'=>['string','required','min:3'],
            'banner'=>['image','required','max:2024'],
            'category_id'=>['string','required'],
            'price'=>['integer','required']
        ]);
        $file=$request->file('banner');
        $ext=$file->getClientOriginalExtension();
        $file_name=auth()->user()->id.'_'.time().'.'.$ext;
        $file->storeAs('images/banner',$file_name,'public_files');
        $data['banner']=$file_name;
        $data['user_id']=auth()->user()->id;
        Advertising::create(
            $data
        );
        return redirect(route('advertisings.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function show(Advertising $advertising)
    {
        $advertising->load(['user','category']);
        return view('panel/advertisings/show',compact('advertising'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertising $advertising)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertising $advertising)
    {
        if ($request->Condition == 0){
            $advertising->update(['Condition'=>0]);
        }else $advertising->update(['Condition'=>1]);
        return redirect(route('advertisings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising ,Request $request)
    {
        $advertising->delete();
        return back();
    }
}
