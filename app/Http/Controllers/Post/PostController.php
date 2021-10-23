<?php

namespace App\Http\Controllers\Post;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $post = Post::all();
        return view('admin.post.index',compact('post'));
    }
    

    
    public function create()
    {

        $category = Category::all();
        $tag = Tag::all();
        return view('admin.post.create',compact('category','tag'));
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|',
        //     'slug' => 'required|alpha-dash|unique:categories,slug',
            
        // ]);
        $posts = new Post;

        $posts->title = $request->title;
        $posts->slug = $request->slug;
        
        //$posts->category_id =  json_encode($request->category_id);
        $posts->des1 = $request->des1;
        $posts->poem = $request->poem;
        $posts->des2 = $request->title;
        $posts->socail1 = $request->socail1;
        $posts->link1 = $request->link1;
        $posts->socail2 = $request->socail2;
        $posts->link2 = $request->link2;
        $posts->socail3 = $request->socail3;
        $posts->link3 = $request->link3;
        $posts->user_id = Auth::id();
        $success =  $posts->save();
         
        $posts->categories()->sync($request->input('category_id'));
        $posts->tag()->sync($request->input('tag_id'));
        
        

     

    //    if($success){
    //     $notification=array(
    //         'messege'=>'Posts Insert  successfully!',
    //         'alert-type'=>'success'
    //          );
    //        return Redirect()->back()->with($notification);
    //    }else{
    //     $notification=array(
    //         'messege'=>'Posts Not Insert!',
    //         'alert-type'=>'error'
    //          );
    //    }




       
        

    }

    public function postsupdatestatus(Request $request){
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


    public function edit($id,$slug)
    {
        $ids =  Crypt::decrypt($id);
        $category = Category::all();
        $tag = Tag::all();
        $posts = Post::findOrFail($ids,$slug);
        return view('admin.post.edit',compact('category','tag','posts'));
    }





    public function delete($id,$slug){

        $ids =  Crypt::decrypt($id);
        $posts = Post::findOrFail($ids,$slug);
        if(!is_null($posts)){
            $posts->delete();
        }
        $notification=array(
            'messege'=>'Posts Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }

}
