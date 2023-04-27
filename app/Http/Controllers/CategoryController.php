<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use App\Models\Category;
class CategoryController extends Controller
{
    public function AllCat(){
        $categories=Category::latest()->paginate(4);
        $trachCat=Category::onlyTrashed()->latest()->paginate(2);
        return view("admin.category.index",compact('categories','trachCat'));
    }
    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],[
            'category_name.required' => 'please input category name',
            'category_name.max' => 'max length is 255',
        ],
    );
    // Category::insert(
    //     [
    //         'category_name'=>$request->category_name,
    //         'user_id'=>Auth::user()->id,
    //         'created_at'=>Carbon::now(),
    //     ]
    //     );
    $category=new Category;
    $category->category_name=$request->category_name;
    $category->user_id=Auth::user()->id;
    $category->save();
    return  Redirect()->back()->with('success','category inserted succesfully');
    }
    public function Edit($id){
        $categories=Category::find($id);
        return view("admin.category.edit",compact('categories'));

    }
    public function SoftDelete($id){
        $delete=Category::find($id)->delete();
        return  Redirect()->back()->with('success','category deleted succesfully');

    }
    public function Update(Request $request,$id){
        $update=Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id'=>Auth::user()->id
        ]
    );
    return  Redirect()->route('all.category')->with('success','category updated succesfully');
    }
    public function Restore($id){
        $delete=Category::onlyTrashed()->find($id)->restore();
        return  Redirect()->back()->with('success','category restore succesfully');

    }
    public function Fdelete($id){
        $delete=Category::onlyTrashed()->find($id)->forceDelete();
        return  Redirect()->back()->with('success','category permanently deleted');

    }
}
