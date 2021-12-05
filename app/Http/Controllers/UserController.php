<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ErrorMessages;

class UserController extends Controller
{

    public function login(Request $request, User $user, ErrorMessages $errorMessages){

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $login = $user->where('email','=',$request->email)->first();

        if(!$login){

            return $errorMessages->wrongCredentials(['email','password']);

        }

        if(!Hash::check($request->password, $login->password)){

            return 0;

        }

        session([

            'user' => $login

        ]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'full_name' => 'required',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'type' => 'required',
            'password' => 'required'
        ]);

        if($validated){

            $user->name = $request->name;
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->type = $request->type;
            $user->password = Hash::make($request->password);
            $user->save();

            //return message

        }else{



        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        $show = $user->find($request->id);
        return $show;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required|unique:users|max:255',
            'full_name' => 'required',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'type' => 'required',
        ]);

        if($validated){

            $update = $user->find($request->id);
            $update->name = $request->name;
            $update->full_name = $request->full_name;
            $update->email = $request->email;
            $update->gender = $request->gender;
            $update->type = $request->type;

            if(!is_null($request->password)){
                $update->password = Hash::make($request->password);
            }

            $update->save();

        }else{



        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user){
        $destroy = $user->find($request->id);
        $destroy->delete();
    }
}
