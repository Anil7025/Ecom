<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['status'])) {
                $status = 0;
            }else{
                $status = 1;
            }
            $categories = new Category;
            $categories->name = $data['category_name'];
            $categories->parent_id = $data['parent_id'];
            $categories->description = $data['description'];
            $categories->url = $data['url'];
            $categories->status = $status;
            $categories->save();
            return redirect('admin/viewCategory')->with('flash_message_success','Data insert successfully');
        }
        $levels = Category::where(['parent_id'=> 0])->get();
        return view('admin.category.addCategory')->with(compact('levels'));
    }


    public function editCategory(Request $request, $id= null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['status'])) {
                $status = 0;
            }else{
                $status = 1;
            }
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'], 'url'=>$data['url'],'status'=>$status,'parent_id'=>$data['parent_id']]);
            return redirect('/admin/viewCategory')->with('flash_message_success','Category data has been Updated successfully');
        }
        //echo "test"; die;
        $categoriesDetail = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=> 0])->get();
        return view('admin.category.editCategory')->with(compact('categoriesDetail','levels'));
    }

    public function viewCategory(){
        $categories = Category::get();
        $categories = json_decode(json_encode($categories));
        return view('admin.category.viewCategory')->with(compact('categories'));
    }

    public function deleteCategory(Request $request, $id = null){
        if (!empty($id)) {
            Category::where(['id'=>$id])->delete();
        }
        return redirect()->back()->with('flash_message_success','Category data Deleted Successfully');
    }
}
