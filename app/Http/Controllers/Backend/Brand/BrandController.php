<?php

namespace App\Http\Controllers\Backend\Brand;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brand = Brand::latest()->get();
        return view('backend.brand.index', compact('Brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validator
         $request->validate([
            'brand'  =>  'required|unique:brands,name'
        ]);

        // store
        $Brand = Brand::insert([
            'name'  => $request->brand,
            'created_at'    =>  Carbon::now()
        ]);

        // Confirm Message
        if($Brand) {
            $notification = array(
                'message' => 'Brand Inserted Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('brand.index')->with($notification);
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
        $Edit = Brand::find($id);
        return view('backend.brand.edit', compact('Edit'));
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
        // validator
        $request->validate([
            'brand'  =>  'required|unique:brands,name'
        ]);

        // store
        $Update = Brand::findOrFail($id)->update([
            'name'  => $request->brand,
            'updated_at'    => Carbon::now()
        ]);

        // Confirm Message
        if($Update) {
            $notification = array(
                'message' => 'Brand Updated Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('brand.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete = Brand::destroy($id);

        // Confirm Message
        if($Delete) {
            $notification = array(
                'message' => 'Brand Deleted Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('brand.index')->with($notification);
    }
}
