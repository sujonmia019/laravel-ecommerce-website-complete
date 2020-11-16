<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Model\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Size = Size::latest()->get();
        return view('backend.product.size.index', compact('Size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.size.create');
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
            'size'  =>  'required|unique:sizes,name'
        ]);

        // store
        $Size = Size::insert([
            'name'  => $request->size,
            'created_at'    =>Carbon::now()
        ]);

        // Confirm Message
        if($Size) {
            $notification = array(
                'message' => 'Size Inserted Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('size.index')->with($notification);
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
        $Edit = Size::findOrFail($id);
        return view('backend.product.size.edit', compact('Edit'));
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
            'size'  =>  'required|unique:sizes,name'
        ]);

        // store
        $Update = Size::findOrFail($id)->update([
            'name'  => $request->size,
            'updated_at'    =>Carbon::now()
        ]);

        // Confirm Message
        if($Update) {
            $notification = array(
                'message' => 'Size Updated Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('size.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete = Size::destroy($id);

        // Confirm Message
        if($Delete) {
            $notification = array(
                'message' => 'Size Deleted Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('size.index')->with($notification);
    }
}
