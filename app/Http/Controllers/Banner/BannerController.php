<?php

namespace App\Http\Controllers\Banner;

use App\Banner;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    
        $banners = Banner::all();
        return view('admin.banner.index',compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'main_title' => 'required|',
            'title_2nd' => 'required|',
            'title_3rd' => 'required|',
            'social1' => 'required|',
            'social2' => 'required|',
            'social3' => 'required|',
            'slug' => 'required|unique:banners,slug',
            'imagename' => 'image|required|mimetypes:image/jpeg,image/png,image/jpg|max:2000',
            'files' => 'required|mimes:pdf|max:3048',
            
        ]); 
            
       
            $banners = new Banner();
            $banners->main_title = $request->main_title;
            $banners->title_2nd = $request->title_2nd;
            $banners->title_3rd = $request->title_3rd;
            $banners->title_4th = $request->title_4th;
            $banners->title_5th = $request->title_5th;
            $str = strtolower($request->slug);
            $banners->slug = preg_replace('/\s+/','-',$str);
            $banners->social1 = $request->social1;
            $banners->social2 = $request->social2;
            $banners->social3 = $request->social3;
            $banners->social4 = $request->social4;
            $banners->link1 = $request->link1;
            $banners->link2 = $request->link2;
            $banners->link3 = $request->link3;
            $banners->link4 = $request->link4;

            if ($files = $request->file('files')) {
                // Define upload path
                $destinationPath = public_path('Image/PDF/'); // upload path
             // Upload Orginal Image           
                $pdf = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $pdf);
                // $insert['image'] = "$profileImage";
             // Save In Database

             $banners->files = $pdf;
             }

         
            $image_one=$request->imagename;
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(1920,650)->save('Image/Banner/'.$image_one_name);
                $banners->imagename = $image_one_name;


           $banners->save();     
     
          

        $notification=array(
            'messege'=>'Banner Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('banners.all')->with($notification);
        



    }

    public function view($id){

        $ids =  Crypt::decrypt($id);
        $banner = Banner::findOrFail($ids);
        return view('admin.banner.view', compact('banner'));
    }

    
    public function edit($id){

        $ids =  Crypt::decrypt($id);
        $banner = Banner::findOrFail($ids);
        return view('admin.banner.edit', compact('banner'));
    }

    public function bannerstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Banner::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function update(Request $request ,$id)
    {
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'main_title' => 'required|',
            'title_2nd' => 'required|',
            'title_3rd' => 'required|',
            'social1' => 'required|',
            'social2' => 'required|',
            'social3' => 'required|',
            'slug' => 'required|unique:banners,slug,'.$ids,
            
        ]); 

      
        $banners = Banner::findOrFail($ids);

        $banners->main_title = $request->main_title;
        $banners->title_2nd = $request->title_2nd;
        $banners->title_3rd = $request->title_3rd;
        $banners->title_4th = $request->title_4th;
        $banners->title_5th = $request->title_5th;
        $str = strtolower($request->slug);
        $banners->slug = preg_replace('/\s+/','-',$str);
        $banners->social1 = $request->social1;
        $banners->social2 = $request->social2;
        $banners->social3 = $request->social3;
        $banners->social4 = $request->social4;
        $banners->link1 = $request->link1;
        $banners->link2 = $request->link2;
        $banners->link3 = $request->link3;
        $banners->link4 = $request->link4;
        $image_one=$request->imagename;


       if(empty($request->file('imagename')) ){
        $update = $banners->save();
    }else{

        if ($request->file('imagename')) {

  
            $file_old = 'Image/Banner/'.$banners->imagename;
            unlink($file_old);

            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(1920,650)->save('Image/Banner/'.$image_one_name);
            $banners->imagename = $image_one_name;
            $banners->save();

           
         }

         
    }

    if(empty($request->file('files')) ){
        $update = $banners->save();
    }else{

        if ($files = $request->file('files')) {

  
            $file_old = 'Image/PDF/'.$banners->files;
            unlink($file_old);
    
            // Define upload path
            $destinationPath = public_path('Image/PDF/'); // upload path
            // Upload Orginal Image           
               $pdf = date('YmdHis') . "." . $files->getClientOriginalExtension();
               $files->move($destinationPath, $pdf);
               // $insert['image'] = "$profileImage";
            // Save In Database
    
            $banners->files = $pdf;
            $banners->save();
         }
   
    }
    
        $banners->save();
        $notification=array(
            'messege'=>'Banner Update successfully!',
            'alert-type'=>'success'
             );
             return Redirect()->route('banners.all')->with($notification);
        

    }



    
    public function delete($id){

        $ids =  Crypt::decrypt($id);
        $banner = Banner::findOrFail($ids);
        if(!is_null($banner)){
            $file_old = 'Image/Banner/'.$banner->imagename;
            $pdf = 'Image/PDF/'.$banner->files;
            unlink($file_old);
            unlink($pdf);
            $banner->delete();
        }

      

        
        $notification=array(
            'messege'=>'Banner Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }


}
