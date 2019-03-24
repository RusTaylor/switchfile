<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/panel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        try{
           $this->validate($request,[
              'name' => 'required|min:3|max:255',
              'password' => 'required|min:6'
           ]);

           if (Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('password')])){
               return redirect(route('account'))->with('success',trans('Вы успешно вошли'));
           }
           return back()->with('error',trans('Ошибка при входе в аккаунт, проверьте правильность введённых данных'));

        }catch (ValidationException $e){
            Log::error($e->getMessage());
            return back()->with('error',trans('Ошибка при входе в аккаунт, некоретный ввод данных'));
        }

    }
}
