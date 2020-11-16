<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::latest()->get();
        return view('backend.category.index', compact('Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            'category'  =>  'required|unique:categories,name'
        ]);

        // store
        $Category = Category::insert([
            'name'  => $request->category,
            'created_at'    => Carbon::now()
        ]);

        // Confirm Message
        if($Category) {
            $notification = array(
                'message' => 'Category Inserted Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('category.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $Edit = Category::findOrFail($id);
        return view('backend.category.edit', compact('Edit'));
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
            'category'  =>  'required|unique:categories,name'
        ]);

        // store
        $Update = Category::findOrFail($id)->update([
            'name'  => $request->category,
            'updated_at'    => Carbon::now()
        ]);

        // Confirm Message
        if($Update) {
            $notification = array(
                'message' => 'Category Updated Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::destroy($id);

        // Confirm Message
        if($Category) {
            $notification = array(
                'message' => 'Category Deleted Successfull !',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('category.index')->with($notification);
    }
}
