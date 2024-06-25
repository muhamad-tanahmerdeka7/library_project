<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
public  function add_book() {
    $data =  Category::all();

    return view('admin.add_book', compact('data'));
}

public function store_book(Request $request) {
    $request->validate([
            'book_name' => 'required|string',
            'auther_name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
            'book_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'auther_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = new Book();
        $data->title = $request->book_name;
        $data->auther_name = $request->auther_name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;

        if ($request->hasFile('book_img')) {
            $book_image_name = time() . '_' . $request->file('book_img')->getClientOriginalName();
            $request->file('book_img')->move(public_path('book'), $book_image_name);
            $data->book_img = $book_image_name;
        }

        if ($request->hasFile('auther_img')) {
            $auther_image_name = time() . '_' . $request->file('auther_img')->getClientOriginalName();
            $request->file('auther_img')->move(public_path('auther'), $auther_image_name);
            $data->auther_img = $auther_image_name;
        }

        $data->save();

        return redirect()->back()->with('message', 'Book Added Successfully');
    }
}