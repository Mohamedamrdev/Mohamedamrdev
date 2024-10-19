<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
    public function index()
    {

        return view('users.users');
    }


    public function store(Request $Request) {
        // dd($Request->all());

        // Validate incoming request data
        $validatedData = $Request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'active' => 'nullable|boolean'
            // dd($Request->all()),
        ]);

        // Create the user and save it to the database
    $user = new User();
    $user->fullname = $validatedData['fullname'];
    $user->username = $validatedData['username'];
    $user->email = $validatedData['email'];
    $user->name = $validatedData['name'];
    $user->active = $Request->has('active') ? 1 : 0;
    $user->password = bcrypt($validatedData['password']); // Hash the password before saving
    $user->save();

    // dd($validatedData);

    // dd($user);

    // Return a success response
    if ($user->save()) {
        // Flash success message to session
        return redirect()->route('adduser')->with('success', 'User created successfully');
    } else {
        // Flash error message to session
        return redirect()->route('adduser')->with('error', 'Failed to create user');
    }
    // dd($Request);
}


public function edit(User $user)

{
    return view('users.edituser', compact('user'));
}

public function Update(Request $request, User $User)

{
    
    $User->update($request->all());
    // dd($User);
    return redirect()->route('userlist')->with('success', 'User updated successfully.');
}


}
