<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Menampilkan semua buku
    public function index()
    {
        $data = Book::all();

        return view('home.index', compact('data'));
    }

    // Menampilkan detail buku
    public function book_details($id)
    {
        $data = Book::find($id);
        
        return view('home.book_details', compact('data'));
    }

    // Meminjam buku
    public function borrow_books($id)
    {
        $book = Book::find($id);

        if (!$book) { // Memastikan buku ditemukan
            return redirect()->back()->with('message', 'Buku tidak ditemukan');
        }

        $quantity = $book->quantity;

        if ($quantity >= 1) { // Memeriksa ketersediaan buku
            if (Auth::check()) { // Memeriksa apakah pengguna sudah login
                $user_id = Auth::user()->id;
                $borrow = new Borrow();
                $borrow->book_id = $id;
                $borrow->user_id = $user_id;
                $borrow->status = 'Applied';
                $borrow->save();

                return redirect()->back()->with('message', 'Permintaan untuk meminjam buku telah dikirim ke admin');
            } else {
                return redirect('/login')->with('message', 'Silakan login untuk meminjam buku');
            }
        } else {
            return redirect()->back()->with('message', 'Buku tidak tersedia dalam jumlah yang cukup');
        }
    }
}