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


    public function store(Request $request) {
        // Validate incoming request data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string', // Ensure role is validated
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'phone_number' => 'nullable|string|max:15',
            'active' => 'nullable|boolean',
        ]);

        // Create the user and save it to the database
        $user = new User();
        $user->fullname = $validatedData['fullname'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->name = $validatedData['name'];
        $user->phone_number = $validatedData['phone_number'];
        $user->active = $request->has('active') ? 1 : 0;
        $user->role = $validatedData['role']; // Save selected role
        $user->password = bcrypt($validatedData['password']); // Hash the password before saving

        // Save the user
        $user->save();

        // Flash success message to session
        return redirect()->back()->with([
            'message' => 'Operation Successful!',
            'alert-type' => 'success'
        ]);
}



public function edit(User $user)
{
    if (!$user) {
        return redirect()->route('userlist')->with('error', 'User not found.');
    }
    return view('users.edituser', compact('user'));
}




    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string',
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'active' => 'nullable|boolean',
        ]);

        // Update user attributes
        $user->fullname = $validatedData['fullname'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->name = $validatedData['name'];
        $user->phone_number = $validatedData['phone_number'];
        $user->active = $request->has('active') ? 1 : 0;
        $user->role = $validatedData['role'];

        // Hash the password if it is being updated
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Save the changes
        $user->save();

        return redirect()->route('userlist')->with('success', 'User updated successfully.');
    }


}
