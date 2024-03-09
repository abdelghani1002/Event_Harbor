<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view("admin.users.index", compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $data = $request->validate([
            'is_banned' => "in:1,0"
        ]);
        $user->update($data);
        return redirect()->back()->with("success", "User has been updated successfully.");
    }
}
