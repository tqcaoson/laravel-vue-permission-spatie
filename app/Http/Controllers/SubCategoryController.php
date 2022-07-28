<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use Image;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategoryList = SubCategory::with('categories')->get();
        // dd($subCategoryList);
        return response()->json(['subCategoryList'=>$subCategoryList],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
     
       $this->formValidation($request);
       $cat_info = new SubCategory();
       $cat_info->cat_id = $request->cat_id;
       $cat_info->sub_cat_name = $request->sub_cat_name;
       $cat_info->save();

       return ['status'=>'success'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCategoryById = SubCategory::find($id);
        return response()->json(['subCategoryById'=>$subCategoryById],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory,$id)
    {
        $cat_info = SubCategory::find($id);
       
        $cat_info->cat_id = $request->cat_id;
        $cat_info->sub_cat_name = $request->sub_cat_name;
        $cat_info->save();
        return ['status'=>'success'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory,$id)
    {
        SubCategory::destroy($id);
        return ['status'=>'success'];
    }

    public function formValidation($request){
        $this->validate($request,[
            'cat_id' => 'required',
            'sub_cat_name' => 'required',
        ]);
    }


}
