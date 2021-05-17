<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckRegistrationRequest;
use App\Http\Requests\CheckUserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;



class ManageUserController extends Controller
{
    public function create_user_view()
    {
        return view('app.create_user');
    }

    public function user_save(CheckRegistrationRequest $request)
    {
        $request->validated();

        $data = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);

        if($data)
        {
            return back()->with('success','Created');
        }
        return back()->withErrors('Something went wrong');
    }

    public function edit_user($id)
    {
        
        $user_data = User::where('id',$id)->first();
        return view('app.edit_user',['user_data'=>$user_data]);
    }

    public function update_user(CheckUserUpdateRequest $request)
    {
       
        $request->validated();

        $user = User::where('id',$request->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        
        if($request->user != null)
        {
            $user->role = $request->role;
        }

        if($request->password != null)
        {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success','User has been updated');

    }

    public function unsuspend_user($id)
    {
        $user = User::find($id);
        $user->suspended_at = null;
        $user->save();

        return back();
 
    }

    public function suspend_user($id)
    {
        $user = User::find($id);
        $user->suspended_at = Carbon::now();
        $user->save();

        return back();
 
    }

    public function delete_user($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return back();
 
    }

    public function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            Auth::logout();
            return redirect('/');
        }
    }

}
