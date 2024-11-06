<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tag;
use App\Models\Item;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function order()
    {
        return view('order');
    }

    public function admin()
    {
        $users = User::all();
        return view ('users.users', ['users' => $users]);
    }

    public function index()
    {
        $items = Item::all();
        $tags = Tag::all();
        return view('home',['tags' => $tags, 'items' => $items]);
    }

    public function adduser()
    {
        return view('users.adduser');
    }

    public function userlist()
    {
        // dd('Reached userlist method');
        $users = User::all();
        return view('users.users', ['users' => $users]);
    }

    public function addCategory()
    {
        return view('categories.addcategory');
    }

    public function categorieslist()

    {
        $tags = Tag::all();
        return view('categories.categories', ['tags' => $tags]);
    }

    public function items()
    {
        $items = Item::all();
        return view('items.items', ['items' => $items]);
    }

    public function additem()
    {
        $tags = Tag::all();
        return view('items.addItem', ['tags' => $tags]);
    }


    public function addphoto()

    {
        return view();
    }


    public function booklist()
    {
        $books = Book::all();
        return view('book/booklist', compact('books'));
    }



    //web site//

    public function home()
    {
        $items = Item::all();
        $tags = Tag::all();
        return view('index',['tags' => $tags, 'items' => $items]);
    }

    public function booktable()
    {
        return view('book');
    }

    public function menu()
    {
        $items = Item::all();
        $tags = Tag::all();
        return view('menu', ['tags' => $tags, 'items' => $items]);
    }

    public function about()
    {
        return view('about');
    }

    public function search(Request $Request)
    {
        $email = $Request->input('search');

        $books = Book::whereRaw('LOWER(email) = ?', [strtolower($email)])->get();

        return view('viewbook', ['books' => $books]);
    }

    public function profile()
{
    $user = Auth::user(); // Get the current authenticated user
    $orders = $user->orders; // Fetch the user's orders

    return view('profile', compact('user', 'orders')); // Return the profile view with user data
}

}
