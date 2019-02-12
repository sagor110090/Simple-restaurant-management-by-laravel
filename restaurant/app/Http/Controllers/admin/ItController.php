<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;

class ItController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index')->with('items', $items);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $category = Category::all();
        return view('admin.item.additem')->with('categorys',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $items = new Item;
        $items->name = $request->name;
        $items->category_id = $request->category;
    
        
        if ($request->hasFile('image')) {
            $items->image = $request->image->store('public/image');
         }

        $items->description = $request->description;
        $items->Price = $request->Price;
        $items->save();
       return redirect()->route('item.index');


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
        $category = Category::all();
        
        $items = Item::find($id);
        return view('admin.item.edit')->with('items',$items) ->with('categorys',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $items = Item::find($id);
        $items->name = $request->name;
        $items->category_id = $request->category;
    
        
        if ($request->hasFile('image')) {
            $items->image = $request->image->store('public/image');
         }

        $items->description = $request->description;
        $items->Price = $request->Price;
        $items->save();
       return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::find($id);
        $items->delete();
        return redirect()->route('item.index');
    }
}
