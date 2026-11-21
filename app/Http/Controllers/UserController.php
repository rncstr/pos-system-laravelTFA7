<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
    public function index()
    {
        return view('users', [
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('users-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'  => 'required|string|max:255|unique:users,username',
            'full_name' => 'required|string|max:255',
        ]);

        User::create($validated);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        return view('users-edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username'  => 'required|string|max:255|unique:users,username,' . $user->id,
            'full_name' => 'required|string|max:255',
            'avatar'    => 'nullable|image|max:2048',
        ]);

        $updateData = [
            'username'  => $validated['username'],
            'full_name' => $validated['full_name'],
        ];

        if ($request->hasFile('avatar')) {
            // Prepare a display-ready 200x200 thumbnail using Intervention Image
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('avatar')->getPathname());
            $image->cover(200, 200);

            $path = 'avatars/' . Str::random(20) . '.jpg';
            Storage::disk('public')->put($path, (string) $image->toJpeg(85));

            // Remove old avatar if one existed
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $updateData['avatar'] = $path;
        }

        $user->update($updateData);

        return redirect('/users');
    }
}