<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\TopCategory;
use DB;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return 'welcome';
    }

    public function top_create(){
        return view('add_category');
    }

    public function main_create(){
        return view('add_maincat');
    }
    public function top_store(Request $request){
        $request->validate([
            'name' => 'required',
            'tag'=> 'required'
        ]);

        TopCategory::create([
            'name' => $request->name,
            'tag' => $request->tag,

         ]);

        return "Data Entered";
    }

    public function main_store(Request $request){

        $request->validate([
            'topcat_id' => 'required',
            'name' => 'required',
            'tag'=> 'required'
        ]);

        MainCategory::create([
            'topcat_id' => $request->topcat_id,
            'name' => $request->name,
            'tag' => $request->tag,

         ]);

         return "Data Entered main category";
    }

    public function store(CategoryFormRequest $request){


    }

    public function getcat(Request $request){
        $main_category = DB::table('maincategory')->where('topcat_id', $request->id)->get();
        return response()->json(['main_category'=>$main_category]);

    }
}
