<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
            'surname' => 'required|max:45:string',
            'name' => 'required|max:45:string',
            'patronymic' => 'max:45:string',
            'login' => 'required|alpha_dash|max:15|unique:users,login',
            'phone_number' => 'required|string',
            'picture' => 'image',
            'email' => 'required|email|max:45|unique:users,email',
            'password' => 'required|between:6,80|confirmed',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create(
            [
            'surname' => $data['surname'],
            'name' => $data['name'],
            'patronymic' => $data['patronymic'],
            'login' => $data['login'],
            'phone_number' => $data['phone_number'],
            'image' => $data['image'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]
        );
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        //dd(1);
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = "images/users/";
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $input['image'] = $imagePath . $imageName;
        } else {
            $input['image'] = null;
        }
        $user = $this->create($input);
        //dd($user);
        $user->roles()->attach(3);

        return redirect()->to('/')->with('message', __('auth.message'));
    }
}
