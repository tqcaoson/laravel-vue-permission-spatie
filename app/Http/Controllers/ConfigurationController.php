<?php

namespace App\Http\Controllers;

use App\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configList = Configuration::all();
        // dd($contentList);
        return response()->json(['configList'=>$configList],200);
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
        
        $file_url = '';
        if($request->logo !=''){
           $uploadPath = public_path('uploads');
           $fileName = $request->logo->getClientOriginalName();
           $newFileName = time().'.'.$request->logo->getClientOriginalExtension();
           $file_url = $newFileName;
           $request->logo->move($uploadPath,$newFileName);
        }

        $content = new Configuration();
        $content->header_text = $request->header_text;
        $content->slogan_text = $request->slogan_text;
        $content->contact_email = $request->contact_email;
        $content->contact_mobile = $request->contact_mobile;
        $content->logo = $file_url;
        $content->footer_text = $request->footer_text;
        $content->save();

        return ['status'=>'success'];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configById = Configuration::find($id);
        return response()->json(['configById'=>$configById],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuration $configuration,$id)
    {
        $this->formValidation($request);       
        
        $file_url = '';
        $content = Configuration::find($id);
        if($request->logo !=''){
           $uploadPath = public_path('uploads');
           $fileName = $request->logo->getClientOriginalName();
           $newFileName = time().'.'.$request->logo->getClientOriginalExtension();
           $file_url = $newFileName;
           $request->logo->move($uploadPath,$newFileName);
           $content->logo = $file_url;
        }

       
        $content->header_text = $request->header_text;
        $content->slogan_text = $request->slogan_text;
        $content->contact_email = $request->contact_email;
        $content->contact_mobile = $request->contact_mobile;
        $content->footer_text = $request->footer_text;
        $content->save();

        return ['status'=>'success'];
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuration $configuration,$id)
    {
        $getFile = Configuration::find($id);
        if($getFile->logo !=''){
           
            $path = public_path('uploads/'.$getFile->logo);
            unlink($path);
        }      
        Configuration::destroy($id);
        return ['status'=>'success'];
    }

    public function getSubCategoryByCategoryId($id){
        $subCategoryList = SubCategory::Where('cat_id',$id)->get();
        return response()->json(['subCategoryList'=>$subCategoryList],200);
    }


    public function formValidation($request){
        $this->validate($request,[
            'contact_email' => 'required',
            'contact_mobile' => 'required',
            'footer_text' => 'required',
            
        ]);
    }

    /**
     * get category wise content .
     *
     * @param  \App\Content  empty
     * @return \Illuminate\Http\Response
     */
    public function categoryWiseContent(){
       $categoryWiseContent = DB::table('contents')
       ->join('categories','contents.category_id','=','categories.id')
       ->select('categories.cat_name', DB::raw('count(contents.id) as total'))
       ->where('contents.deleted_at', Null)
       ->groupBy('contents.category_id')
       ->get();
       return response()->json(['categoryWiseContent'=>$categoryWiseContent],200);

    }


      /**
     * get category wise sub category .
     *
     * @param  \App\Content  empty
     * @return \Illuminate\Http\Response
     */
    public function categoryWiseSubCategory(){
        $categoryWiseSubCategory = DB::table('contents')
        ->join('sub_categories','contents.subCategory_id','=','sub_categories.id')
        ->select('sub_categories.sub_cat_name', DB::raw('count(contents.id) as total'))
        ->where('contents.deleted_at', Null)
        ->groupBy('contents.subCategory_id')
        ->get();

        return response()->json(['categoryWiseSubCategory'=>$categoryWiseSubCategory],200);
 
     }
}
