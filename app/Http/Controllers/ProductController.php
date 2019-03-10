<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;
use App\ProductsAttribute;

class ProductController extends Controller
{
    public function addProduct(Request $request){

        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            //insert data base value
            if (empty($data['category_id'])) {
                return redirect()->back()->with('flash_message_error', 'please Insert Under Category');
            }
            $products = new Product;
            $products -> category_id = $data['category_id'];
            $products -> product_name = $data['product_name'];
            $products -> product_code = $data['product_code'];
            $products -> product_color = $data['product_color'];
            if (!empty($data['description'])) {
                $products -> description = $data['description'];
            }else{
                $products -> description = '';
            }
            $products -> price = $data['price'];
            //image upload
            if ($request->hasFile('image')) {
                //echo $image_tmp = Input::file('image'); die;
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
    				$extension = $image_tmp->getClientOriginalExtension();
    				$filename = rand(111,99999).'.'.$extension;
    				$large_image_path = 'admin/img/product/large/'.$filename;
    				$medium_image_path = 'admin/img/product/medium/'.$filename;
    				$small_image_path = 'admin/img/product/small/'.$filename;
    				// Resize Images
    				Image::make($image_tmp)->save($large_image_path);
    				Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
    				Image::make($image_tmp)->resize(300,300)->save($small_image_path);
    				// Store image name in products table
    				$products->image = $filename;
    			}
            }
            $products -> save();

            //return redirect()->back()->with('flash_message_success', 'Product has been Added successfully ');
            return redirect('/admin/viewProduct')->with('flash_message_success','Product has been added successfully!');
        }
        //categories dropdown use
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
    	foreach($categories as $cat){
    		$categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
    		foreach ($sub_categories as $sub_cat) {
    			$categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
    		}
    	}
        return view('admin.Product.addProduct')->with(compact('categories_dropdown'));
    }

    public function editProduct(Request $request, $id = null){
        if($request->isMethod('post')){
			$data = $request->all();
            //echo "<pre>"; print_r($data); die;

            if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $filename = rand(111,99999).'.'.$extension;
    				$large_image_path = 'admin/img/product/large/'.$filename;
    				$medium_image_path = 'admin/img/product/medium/'.$filename;
    				$small_image_path = 'admin/img/product/small/'.$filename;
    				// Resize Images
    				Image::make($image_tmp)->save($large_image_path);
    				Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
    				Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                }
                    }else{
                        $filename = $data['current_image'];
                    }
                    if (empty($data['description'])) {
                        $data['description']= '';
                    }
                    //Product Update
                    Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],
                    'product_name'=>$data['product_name'],
                    'product_code'=>$data['product_code'],
                    'product_color'=>$data['product_color'],
                    'description'=>$data['description'],
                    'price'=>$data['price'],
                    'image'=>$filename]);

                return redirect()->back()->with('flash_message_success', 'Product has been edited successfully');
        }

        $productDetail = Product::where(['id' =>$id])->first();
         //categories dropdown use
         $categories = Category::where(['parent_id'=>0])->get();
         $categories_dropdown = "<option value='' selected disabled>Select</option>";
         foreach($categories as $cat){
            if($cat->id==$productDetail->category_id){
				$selected = "selected";
			}else{
				$selected = "";
			}
             $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
             $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
             foreach ($sub_categories as $sub_cat) {
                if($sub_cat->id==$productDetail->category_id){
					$selected = "selected";
				}else{
					$selected = "";
				}
                 $categories_dropdown .= "<option value = '".$sub_cat->id."' ".$selected.">&nbsp;&nbsp;--&nbsp;".$sub_cat->name."</option>";
             }
         }

        return view('admin.Product.editProduct')->with(compact('productDetail','categories_dropdown'));
    }

    public function viewProduct(){
        $products = Product::get();
        $products = json_decode(json_encode($products));
        foreach($products as $key => $val){
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name = $category_name->name;
        }
        //echo "<pre>"; print_r($products); die;
        return view('admin.product.viewProduct')->with(compact('products'));
    }


    public function deleteProductImage(Request $request , $id= null){
        // Get Product Image
		$productImage = Product::where('id',$id)->first();
		// Get Product Image Paths
		$large_image_path = 'admin/img/product/large/';
		$medium_image_path = 'admin/img/product/medium/';
		$small_image_path = 'admin/img/product/small/';
		// Delete Large Image if not exists in Folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }
        // Delete Medium Image if not exists in Folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }
        // Delete Small Image if not exists in Folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }
         // Delete Image from Products table
    	Product::where(['id'=>$id])->update(['image'=>'']);
    	return redirect()->back()->with('flash_message_success','Product Image has been Deleted Successfully');
    }


     public function deleteProduct(Request $request , $id= null){
    	Product::where(['id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_success','Product has been Deleted Successfully');
    }

    public function addAttribute(Request $request ,$id = null){
        $productEdit = Product::with('attributes')->where(['id'=> $id])->first();
        //$productEdit = json_decode(json_encode($productEdit));
        //echo "<pre>"; print_r($productEdit); die;
        if($request->isMethod('post')){
            // $data = $request->input();
            // dd($data = $request->input());die;
           $data = $request->all();
            // echo "<pre>"; print_r($data); die;

           foreach ($data['sku'] as $key => $val) {
               if (!empty($val)) {
                   $attribute = new ProductsAttribute;
                   $attribute->product_id = $id;
                   $attribute->sku = $val;
                   $attribute->size = $data['size'][$key];
                   $attribute->price = $data['price'][$key];
                   $attribute->stock = $data['stock'][$key];
                   $attribute->save();
               }
           }
           return redirect('admin/addAttribute/'.$id)->with('flash_message_success','Product Attribute has been Added Successfully');
        }

        return view('admin.attribute.addAttribute')->with(compact('productEdit'));
    }



    public function deleteAttribute($id=null){
        ProductAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Attribute has been deieted Successfully');
    }


    public function products($url = null){
        //check first page 404 page redirect category Url does not exit
        $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
    	if($categoryCount==0){
    		abort(404);
    	}
        //echo $url; die;
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        // echo "<pre>"; print_r($categories); die;
        $catDetail = Category::where(['url'=>$url])->first();
        //echo $catDetail->id; die;
        if ($catDetail->parent_id==0) {
            //if url is Main Category url
            $subCategories = Category::where(["parent_id"=>$catDetail->id])->get();
            foreach ($subCategories as $key => $subCat) {
                $cat_ids[] = $subCat->id;
            }
            $productAll = Product::whereIn('category_id',$cat_ids)->get();
            $productAll = json_decode(json_encode($productAll));
            //  echo "<pre>"; print_r($productAll); die;
        }else{
            //if url is Sub Category url
            $productAll = Product::where(['category_id'=>$catDetail->id])->get();
        }
        return view('frontEnd.products.listing')->with(compact('categories','catDetail','productAll'));
    }

    public function product_detail($id = null){

        $productDetails = Product::with('attributes')->where('id',$id)->first();
        $productDetails = json_decode(json_encode($productDetails));
        //echo "<pre>"; print_r($productDetails); die;
        $categories = Category::with('categories')->where(['parent_id' => 0])->get();
        return view('frontEnd.products.details')->with(compact('productDetails','categories'));
    }

    public function getProductPrice(Request $request){
        $data = $request->all();
        //  echo "<pre>"; print_r($data); die;
        $proArr = explode("-",$data['idSize']);
        // echo $proArr[0]; echo $proArr[1]; die;
        $proAttr = ProductsAttribute::where(['product_id' => $proArr[0], 'size' => $proArr[1]]) -> first();
        echo $proAttr-> price;

    }

}
