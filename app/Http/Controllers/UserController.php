<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ErrorMessages;

class UserController extends Controller
{

    public function logout(User $user, ErrorMessages $errorMessages){

        session()->flush();
        return redirect('/');

    }

    public function login(Request $request, User $user, ErrorMessages $errorMessages){

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $login = $user->where('email','=',$request->email)->first();

        if(!$login || !Hash::check($request->password, $login->password)){

            return $errorMessages->wrongCredentials(['email','password']);

        }

        session([

            'user' => $login

        ]);

        return $errorMessages->redirect($login->type.'/dashboard');

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
    public static function store(Request $request, User $user, ErrorMessages $errorMessages)
    {
       $validated = $request->validate([
            'name' => 'required|unique:users|max:255',
            'full_name' => 'required',
            'email' => 'required|unique:users',
            'gender' => 'required',
            'password' => 'required',
          //  'confirm-password' => 'required'
        ]);

        $user->name = $request->name;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->type = $request->type ?? 1;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->save();

        if(is_null(session('user'))){
            return  $errorMessages->redirect('/login');
        }

        //return message
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
    public function edit(Request $request, User $user, ErrorMessages $errorMessages)
    {
        $validated = $request->validate([
            'id' => 'required'
        ]);

        $edit = $user->find($request->id);

        $data = [
            'id' => $edit->id,
            'name' => $edit->name,
            'full_name' => $edit->full_name,
            'email' => $edit->email,
            'gender' => $edit->gender,
            'type' => $edit->type
        ];

        return $errorMessages->data($data, '.client.modal');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, ErrorMessages $errorMessages)
    {
        $update = $user->find($request->id);
        if($request->name != $update->name){
            $validate = $request->validate([
                'name' => 'required|unique:users|max:255',
            ]);
        }

        if($request->email != $update->email){
            $validate = $request->validate([
                'email' => 'required|unique:users',
            ]);
        }

        if(session('user')->type == 'admin'){
            $validate = $request->validate([
                'type' => 'required',
            ]);
            $update->type = $request->type;
        }

        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required|max:255',
            'full_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            
        ]);

        $update->name = $request->name;
        $update->full_name = $request->full_name;
        $update->email = $request->email;
        $update->gender = $request->gender;

        if(!is_null($request->password)){
            $update->password = Hash::make($request->password);
        }

        $update->save();

        if(session('user')->type == 'client'){
            $update = $user->find($request->id);
            session([

                'user' => $update
    
            ]);

            return $errorMessages->reload();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user, ErrorMessages $errorMessages){
        $destroy = $user->find($request->id);
        $destroy->delete();
        return $errorMessages->reload();
    }
}
