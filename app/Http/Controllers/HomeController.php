<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        $data = Book::all();
        return view('home.index', compact('data'));
    }

    public function book_details($id)
    {
        $data = Book::find($id);
        return view('home.book_details', compact('data'));
    }

    public function borrow_books($id)
    {
        $data = Book::find($id);
        $book_id = $id;
        $quantity = $data->quantity;


        if ($quantity >= '1') {
            if (Auth::id()) {
                $user = Auth::user()->id;
                $borrow = new Borrow;
                $borrow->book_id = $book_id;
                $borrow->user_id = $user;
                $borrow->status = 'Applied';
                $borrow->save();
                return redirect()->back()->with('message', 'Request is sent!');
            } else {
                return redirect()->back()->with('message', 'Not Enough Books');
            }
        }
    }

    public function book_histoire()
    {
        if (Auth::id()) {

            $userid = Auth::user()->id;
            $data = Borrow::where('user_id', '=', $userid)->get();
            return view('home.book_histoire', compact('data'));
        }
    }


    public function cancel_req($id)
    {
        $data = Borrow::find($id);
        $data->delete();

        return redirect()->back()->with('message', ' Successfully Canceled');
    }

    public function explore()
    {
        $data = Book::all();
        return view('home.explore',compact('data'));
    }
}
