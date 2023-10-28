<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user(); 
        return view('pages.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'currentPassword' => 'required_with:password|current_password',
            'password' => 'nullable|min:6|confirmed',
        ]);
    
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
    
        if ($request->filled('password')) {
            if (!Hash::check($validatedData['currentPassword'], $user->password)) {
                return redirect()->back()->withErrors(['currentPassword' => 'Current password is incorrect']);
            }
    
            $user->password = bcrypt($validatedData['password']);
        }
    
        $user->save();
    
        return redirect()->route('show.profile')->with('success', 'Profile and Password updated successfully');
    }
    

    
}
