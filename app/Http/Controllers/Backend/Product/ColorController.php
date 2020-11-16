<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Model\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Color = Color::latest()->get();
        return view('backend.product.color.index', compact('Color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.color.create');
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
            'color'  =>  'required|unique:colors,name'
        ]);

        // store
        $Category = Color::insert([
            'name'  => $request->color,
            'created_at'    =>Carbon::now()
        ]);

        // Confirm Message
        if($Category) {
            $notification = array(
                'message' => 'Color Inserted Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('color.index')->with($notification);
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
        $Edit = Color::findOrFail($id);
        return view('backend.product.color.edit', compact('Edit'));
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
            'color'  =>  'required|unique:colors,name'
        ]);

        // store
        $Update = Color::findOrFail($id)->update([
            'name'  => $request->color,
            'updated_at'    =>Carbon::now()
        ]);

        // Confirm Message
        if($Update) {
            $notification = array(
                'message' => 'Color Updated Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('color.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete = Color::destroy($id);

        // Confirm Message
        if($Delete) {
            $notification = array(
                'message' => 'Color Deleted Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('color.index')->with($notification);
    }


}
