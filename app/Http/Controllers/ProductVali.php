<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestVali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductVali extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= DB::table('product')->get();
        return view('/displayData',["products"=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestVali $request)
    {
        $validated = $request -> validated();
    //     $request->validate([
    //         'pname' => 'required',
    //         'pprice' => 'required',
    //     ],   
    //     [
    //         'pname' => 'Name Must',
    //     ]);
    $imageName = time().'.'.$request->img->extension();
    $request->img->move(public_path('images'),$imageName);
        DB::table('product')->insert([
            "productName"=>$request->pname,
            "description"=>$request->des,
            "qty"=>$request->qty,
            "cateId"=>$request->cateId,
            "image"=>$imageName,
        ]);
    //    return redirect('admin/product/index')->with(["success"=>"Data Insert..."]);
         return redirect('admin/product')->with(["success"=>"Data Insert Succesfully..."]);
        }
        
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products= DB::table('product')->where(['productId'=>$id])->first();
        return view('edit',['p'=>$products]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(isset($request->img)){
            $imageName = time().'.'.$request->img->extension();
            $request->img->move(public_path('images'),$imageName);
            $img="images/". $request->hiddenimg;
            if(file_exists(public_path($img))){
                unlink(public_path($img));
            }
        }else{
            $imageName = $request->hiddenimg;
        }


        $p =[
            "productName"=>$request->pname,
            "description"=>$request->des,
            "qty"=>$request->qty,
            "cateId"=>$request->cateId,
            "image"=>$request->$imageName,
        ];
        DB::table('product')->where(['productId'=>$id])->update($p);
        return redirect('admin/product')->with(["update"=>"Data Updated Successfully..."]);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('product')->where(['productId'=>$id])->delete();
        return redirect('admin/product')->with(["del"=>"Data Deleted Successfully..."]);
        
    }
}
