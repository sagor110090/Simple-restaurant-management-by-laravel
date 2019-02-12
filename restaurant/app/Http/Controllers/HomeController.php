<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Item;
use App\Reservation;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slide = Slider::all();
        $category = Category::all();
        $item = Item::all();
       
        return view('welcome')->with('slide',$slide)->with('category',$category)->with('item',$item);
        
    }
 
    public function contact(Request $request)
    {       //the are reservation my folt
        
        $contact = new Reservation;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->time = $request->time;
        $contact->message = $request->message;
        $contact->Status = '0';
        $contact->save();
        return redirect()->route('welcome');


    }
 


}
