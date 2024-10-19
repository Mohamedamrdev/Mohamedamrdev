<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Psy\Readline\Hoa\Console;

class BookController extends Controller
{

    public function store(Request $Request)
    {
        // dd($Request);

        $validatedData = $Request->validate([
        'name' => 'required',
        'phone_number' =>'required',
        'email' =>'required',
        'book_date' =>'required',
        'how_many' =>'required',
            // dd($Request->all()),
        ]);


        $book = new Book;
        $book->name = $validatedData['name'];
        $book->phone_number = $validatedData['phone_number'];
        $book->email = $validatedData['email'];
        $book->book_date = $validatedData['book_date'];
        $book->how_many = $validatedData['how_many'];

        $book->save();

        return "success";
    }
}
