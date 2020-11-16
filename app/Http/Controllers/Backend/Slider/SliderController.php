<?php

namespace App\Http\Controllers\Backend\Slider;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Slider = Slider::latest()->get();
        return view('backend.slider.index', compact('Slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_hadding'   =>  'required',
            'hadding'   =>  'required|max:50',
            'image'   =>  'image|mimes:jpg,png'
        ]);

        if($request->has('image')){
            $img = $request->file('image');
            $imageName = $request->hadding. '--' . time().'.'.$img->getClientOriginalExtension();
            $img->move(public_path('frontend/images/slider/'), $imageName);
        }
        if(isset($request->status)){
            $status = 1;
        }
        else{
            $status = 0;
        }
        
        $Create = Slider::create([
            'sub_hadding'   =>  $request->sub_hadding,
            'hadding'       =>  $request->hadding,
            'image'         =>  $imageName,
            'status'        =>  $status
        ]);

        if($Create){
            $notification = array(
                'message'   =>  'Slider created successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('slider.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
