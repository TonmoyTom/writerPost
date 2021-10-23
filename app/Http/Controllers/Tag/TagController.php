<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tags,name',
            'slug' => 'required|alpha-dash|unique:categories,slug',
            
        ]); 


       
            $tags = new Tag();
            $tags->name = $request->name;
            $tags->slug = $request->slug;
            $tags->save();     
     
          

        $notification=array(
            'messege'=>'Tag Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('tags.all')->with($notification);

    }

    public function tagsstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Tag::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    
    public function update(Request $request ,$id)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|unique:tags,name',
            'slug' => 'required|alpha_dash|unique:tags,slug',
            
        ]);

      
        $tags = Tag::findOrFail($id);

        $tags->name = $request->name;
        $tags->slug = $request->slug;
        $tags->save();
  
       

        $notification=array(
         'messege'=>'Tags Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('tags.all')->with($notification);
    }

    public function delete($id){

        $ids =  Crypt::decrypt($id);
        $achive = Tag::findOrFail($ids);
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
