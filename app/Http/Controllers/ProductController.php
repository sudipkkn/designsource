<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCat;
use App\Models\Product;
use App\Models\AddedProCat;

class ProductController extends Controller
{
    //
    function getProcats($id = "")
    {

        $cats = ProductCat::orderBy('id', 'desc')->paginate(3);
        $editcat = ProductCat::find($id);
        return view('admin/productCat', ['cats' => $cats, 'editcat' => $editcat]);
    }

    function addProcats(Request $req)
    {

        $validate = $req->validate([
            'name' => 'required|unique:product_cats|max:255',
            'status' => 'required',
        ]);

        $procat = new ProductCat;

        $procat->name = $req->name;
        $procat->status = $req->status;

        if ($procat->save()) {
            return redirect('wa-admin/manageprocats')->with('success', 'Successfully Added');
        }
    }

    function editProcats(Request $req)
    {

        $procat = ProductCat::find($req->editid);

        if ($req->name != $procat->name) {
            $req->validate([

                'name' => 'required|unique:product_cats|max:255',
                'status' => 'required',

            ]);
        } else {
            $req->validate([
                'status' => 'required',
            ]);
        }


        $procat->name = $req->name;
        $procat->status = $req->status;

        if ($procat->save()) {
            return redirect('wa-admin/manageprocats')->with('info', 'Successfully Updated');
        }
    }

    function dltProcat($id)
    {

        $procat = ProductCat::find($id);

        if ($procat->delete()) {
            return redirect('wa-admin/manageprocats')->with('info', 'Successfully Deleted');
        }
    }

    function viewAddProduct(){

        $getprocats = ProductCat::where('status', '1')->get();
        return view('admin/addnewproduct', ['procats' => $getprocats]);

    }

    function addProduct(Request $request){

        $product = new Product;

        $request->validate([

            'name'=>'required | max:255',
            'description'=>'required',
            'price'=>'required',
            'procats'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->offerprice = $request->offerprice;
        $product->image = $imageName;
        $product->status = 1;
        $product->save();

        request()->image->move(public_path().'/uploaded/', $imageName);
        
        $procats = $request->procats;

        for($i=0; $i < count($procats); $i++ ){

            $insrtary[] = [
                'cat_id' => $procats[$i],
                'product_id' => $product->id
            ];
        }
        AddedProCat::insert($insrtary);

        return back()->with('success', $request->name. 'is Successfully Added');

    }

    function productList(){

        $data = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin/productlist', ['data' => $data]);

    }

}
