<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUserRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreUserRequest  $request)
    {
        $file = $request->file('photo');
        $path = $file->storeAs('uploads', $file->getCTime(). '_' . $file->getClientOriginalName());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile' => $request->profile,
            'photo' => $path,
        ]);

        session()->flash('status', 'User created successfully');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return null
     */
    public function show(User $user)
    {
        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile' => $request->profile,
        ]);


        if (!is_null($request->file('photo'))) {
            $file = $request->file('photo');
            $filename = $file->getCTime() . '_' . $file->getClientOriginalName();
            echo $filename;
            $path = $file->storeAs('uploads', $filename);
            $user->update([
                'photo' => $path
            ]);
        }

        session()->flash('status', 'User update successfully');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('status', 'User deleted successfully');
        return redirect()->route('users.index');
    }
}
