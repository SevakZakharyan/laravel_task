<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CheckLoginRequest;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{

    public function check(CheckLoginRequest $request)
    {
        $request->validated();
        
        $user = User::where('email','=',$request->email)->first();
        
        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                
                $credentials = $request->only('email', 'password');
                
                if(Auth::attempt($credentials))
                {     
                    $request->session()->put('LoggedUser',$user->id);
                }
               
                
                return redirect('app/dashboard');
            }else{
                return back()->withErrors(['Incorrect Password']);
            }
        }else{
            return back()->withErrors(['User not found']);
        }

    }

    public function dashboard(User $user1)
    {
       
        $user = ['user'=>User::where('id','=',session('LoggedUser'))->first()];

        $userslist = ['userlist'=>User::where('id','!=',session('LoggedUser'))->get()];

        if(Auth::user()->role == 'user')
        {
            $questions = Question::whereDoesntHave('answer', fn ($builder) => $builder->where('user_id', auth()->id()))->get();
            


            return view('app.dashboard',$user)->with('questions',$questions);
        }

        return view('app.dashboard',$user,$userslist);
        
    }
}
