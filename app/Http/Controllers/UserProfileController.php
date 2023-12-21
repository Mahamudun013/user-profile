<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
	// This method is used to get users
	public function index(Request $request) {

        $name = $request->input('name');
        
        $profiles = UserProfile::when($name, function ($query) use ($name) {
            return $query->where('name', $name);
        })->get();

        return response()->json($profiles, 200);
    }


    // This method is used to create user
    public function store(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:user_profiles,email',
            'date_of_birth' => 'required|date',
        ]);

        $profile = UserProfile::create($validatedData);

        return response()->json($profile, 201);
    }


    // This method is used to show user
    public function show($id) {

        $profile = UserProfile::findOrFail($id);

        return response()->json($profile, 200);
    }


    // This method is used to update user
    public function update(Request $request, $id) {

        $profile = UserProfile::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('user_profiles')->ignore($profile->id),
            ],
            'date_of_birth' => 'required|date',
        ]);

        $profile->update($validatedData);

        return response()->json($profile, 200);
    }


    // This method is used to delete user
    public function destroy($id) {

        $profile = UserProfile::findOrFail($id);
        $profile->delete();

        return response()->json(null, 204);
    }

}
