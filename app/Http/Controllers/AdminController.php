<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user_type = Auth()->user()->usertype;

            if ($user_type == 'admin') {
                return view('admin.index');
            } else if ($user_type == 'user') {
                return view('home.index');
            }
        } else {
            redirect()->back();
        }
    }


    //CATEGORY
    public function category_page()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new Category;

        $data->cat_title = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function cat_delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
    public function edit_cat($id)
    {
        $data = Category::find($id);

        return view('admin.edit_cat', compact('data'));
    }
    public function update_cat(Request $request, $id)
    {
        $data = Category::find($id);
        $data->cat_title = $request->cat_name;
        $data->save();

        return Redirect('/category_page')->with('message', 'Category Updated Successfully');
    }

    //BOOKS
    public function add_book(Request $request)
    {
        return view('admin.add_book');
    }
}
