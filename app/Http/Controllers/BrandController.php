<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Brand;
use App\Models\Multipic;
// use Carbon\Carbon;
use Illuminate\Support\Carbon;
use Image;

class BrandController extends Controller
{
    //
    public function AllBrand(){
    $brands=Brand::latest()->paginate(3);
    return view('admin.brand.index',compact('brands'));
    }
    public function StoreBrand(Request $request){
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpeg,png,jpg,JPG',
        ],[
            'brand_name.required' => 'please input brand name',
            'brand_image.min' => 'brand should contain image',
        ],
    );
    $brand_image=$request->file("brand_image");
    $name_gen=hexdec(uniqid());
    $img_ext=strtolower($brand_image->getClientOriginalExtension());
    $img_name=$name_gen.'.'.$img_ext;
    $up_location='image/brand/';
    $last_img=$up_location.$img_name;
    $brand_image->move($up_location,$img_name);
Brand::insert([
    'brand_name'=>$request->brand_name,
    'brand_image'=>$last_img,
    'created_at'=>Carbon::now(),
]);
return  Redirect()->back()->with('success','brand inserted succesfully');

    }
    public function Update(Request $request,$id){
        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',
            'brand_image' => 'required|mimes:jpeg,png,jpg,JPG',
        ],[
            'brand_name.required' => 'please input brand name',
            'brand_image.min' => 'brand should contain image',
        ],
    );
    $old_image=$request->old_image;
    $brand_image=$request->file("brand_image");
    if($brand_image){
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='image/brand/';
        $last_img=$up_location.$img_name;
        $brand_image->move($up_location,$img_name);
        unlink($old_image);
    Brand::find($id)->update([
        'brand_name'=>$request->brand_name,
        'brand_image'=>$last_img,
        'created_at'=>Carbon::now(),
    ]);
    return  Redirect()->back()->with('success','brand updated succesfully');
    }else{
        Brand::find($id)->update([
            'brand_name'=>$request->brand_name,
            'created_at'=>Carbon::now(),
        ]);
        return  Redirect()->back()->with('success','brand updated succesfully');
    }


    }
    public function BrandEdit($id){
        $brands=Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
        }
        public function Delete($id){
            $image=Brand::find($id);
            $old_image=$image->brand_image;
            unlink($old_image);
            $delete=Brand::find($id)->delete();
            return  Redirect()->back()->with('success','brand permanently deleted');

        }
        public function Multipic(){
            $images=Multipic::all();
            return view('admin.multipic.index',compact('images'));
        }
        public function StoreImg(Request $request){

            $image =  $request->file('image');

            foreach($image as $multi_img){

            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            $path = public_path('image/multi/'.$name_gen);

            Image::make($multi_img)->resize(300,300)->save( $path);
            // $image->move($path,$name_gen);
            $last_img = 'image/multi/'.$name_gen;
//
// $brand_image=$request->file("brand_image");
// $name_gen=hexdec(uniqid());
// $img_ext=strtolower($brand_image->getClientOriginalExtension());
// $img_name=$name_gen.'.'.$img_ext;
// $up_location='image/brand/';
// $last_img=$up_location.$img_name;
// $brand_image->move($up_location,$img_name);
//
            Multipic::insert([

                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
                } // end of the foreach



                return Redirect()->back()->with('success','Brand Inserted Successfully');


         }
}
