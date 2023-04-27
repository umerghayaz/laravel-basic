<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Brand;
class BrandController extends Controller
{
    //
    public function AllBrand(){
    $brand=Brand::latest()->paginate(3);
    return view('admin.brand.index',compact('brand'));
    }
}
