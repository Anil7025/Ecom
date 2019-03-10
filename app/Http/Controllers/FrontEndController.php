<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontEndController extends Controller
{
    public function index(){
        $productAll =Product::get();
        $productAll = Product::orderBy('id','DESC')->get();
        $productAll = Product::inRandomOrder()->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        // $categories = json_decode(json_encode($categories));
        // echo "<pre>"; print_r($categories); die;


        return view('frontEnd.frontEndContent.index')->with(compact('productAll','categories'));
    }
}
