<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function index()
    {
        if(Auth::id()){
            $user_type = Auth()->user()->usertype;
            if($user_type == 'admin'){
                return view('admin.index');
            }

            else if ($user_type == 'user') {
                return view('home.index');
            }
            
            
        }
            else{
                return redirect()->back();
            }
      
    }

    public function category_page() {
        $data = Category::all();
        return view('admin.category', compact('data'));

    }
    public function add_category(Request $request) {
        // $data = $request->all();
        $data = new Category();
        $data->cat_title = $request->category;
        $data->save();
        
       
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function cat_delete($id) {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function edit_update($id) {
        $data = Category::find($id);
        return view('admin.edit_update', compact('data'));
    }
    public function update_category(Request $request, $id) {
    $data = Category::find($id);
    $data->cat_title = $request->cat_name;
    $data->save();
    return redirect('/category_page')->with('message', 'Category Updated Successfully');
}
}