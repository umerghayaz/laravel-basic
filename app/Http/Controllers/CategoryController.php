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
        return view("admin.category.index",compact('categories'));
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
}