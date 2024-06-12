<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Book;


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
        $data = Category::all();

        return view('admin.add_book', compact('data'));
    }

    public function store_book(Request $request)
    {
        $data = new Book();

        $data->title = $request->title;
        $data->author_name     = $request->author_name;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category;

        $book_image = $request->book_img;

        if ($book_image) {
            $book_image_name = time() . '.' . $book_image->getClientOriginalExtension();

            $request->$book_image->move('book', $book_image_name);
            $data->book_img = $book_image_name;
        }

        $data->save();

        return redirect()->back()->with('message', 'Book Added Successfully');
    }
    public function show_book()
    {
        $book = Book::all();
        return view('admin.show_book', compact('book'));
    }

    public function delete_book($id)
    {
        $data = book::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
}
