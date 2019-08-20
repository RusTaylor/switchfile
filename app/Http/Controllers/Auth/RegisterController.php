<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/panel';
    /** @var User $userModel */
    private $userModel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->userModel = new User();
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Некоректный ввод данных ');
        };
        $name = $request->input('name');
        $password = $request->input('password');
        $check = $this->userModel->where(['name' => $name], 1)->first();
        if (!$check) {
            if ($user = $this->create(['name' => $name, 'password' => $password])) {
                $this->guard()->login($user);//Изменить лишь для создания без логина
                return redirect($this->redirectPath())->with('success', 'Аккаунт успешно зарегестрирован');
            } else {
                return back()->with('error', 'Ошибка при регистрации');
            }
        } else {
            return back()->with('error', 'Такой пользователь уже существует');
        }

    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
