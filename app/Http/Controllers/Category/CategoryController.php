<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => 'required|alpha-dash|unique:categories,slug',
            
        ]); 


       
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->save();     
     
          

        $notification=array(
            'messege'=>'Category Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('categories.all')->with($notification);

    }


    public function categoriesstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Category::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    // public function edit($id){

       
    //     $categorys = Category::findOrFail($id);
    //     return view('Admin.course.category.index', compact('categorys'));
    // }

    public function update(Request $request ,$id)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => 'required|alpha_dash|unique:categories,slug',
            
        ]);

      
        $achive = Category::findOrFail($id);

        $achive->name = $request->name;
        $achive->slug = $request->slug;
        $achive->save();
  
       

        $notification=array(
         'messege'=>'categories Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('categories.all')->with($notification);
    }

    public function delete($id){

        $ids =  Crypt::decrypt($id);
        $achive = Category::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'Category Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }
}
