<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\StudentRequest;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $rules = [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation'=> 'required',
            'type' => User::DEFAULT_TYPE, 
            'cpf' => 'required|string|max:255|unique:users',
            'rg' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
           
        ];
        $messages = [

            'name.required' => 'Por favor, preencha seu nome',
            'name.max'=> 'Número máximo de caracteres atingido',
            'name.unique'=>'O nome já está cadastrado em nosso sistema',

            'cpf.unique'=>'O CPF já está cadastrado em nosso sistema',
            'cpf.required'  => 'Por favor,preencha seu CPF',
            


            'rg.unique'=>'O RG já está cadastrado em nosso sistema',
            'rg.required'  => 'Por favor,preencha seu RG',
            
          
            'phone.unique'=>'O telefone já está cadastrado em nosso sistema',
            'phone.required'  => 'Por favor,preencha seu telefone',

            'adress.required'  => 'Por favor,preencha seu endereço',
            'adress.max'  => 'Limite de caracteres atingido',
            
            'email.required'  => 'Por favor,preencha seu email',
            'email.unique'  => 'O email já esta cadastrado em nosso sistema',

            'password.required'  => 'Por favor,insira sua senha',
            'password.confired'  => 'Por favor,redigite sua senha',
            'password.min'  => 'A senha deve conter pelo menos 6 caractéres',
            'password_confirmation.required'  => 'Por favor,confirme sua senha',
            

            'phone.required'  => 'Por favor,preencha seu telefone',


        ];


       return Validator::make($data,$rules,$messages, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
           // 'password_confirmation'=> 'required|string|min:6',
            'type' => User::DEFAULT_TYPE, 
            'cpf' => 'required|string|max:255|unique:users',
            'rg' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
           
        ]); 
        
        
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => User::DEFAULT_TYPE,
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
            'phone' => $data['phone'],
            'adress' => $data['adress'],
              
        ]);
    }
 


    public function messages()
    {
        return [
            'name.required' => 'Por favor, preencha seu nome',
            'name.max'=> 'Número máximo de caracteres atingido',
            'name.unique'=>'O nome já está cadastrado em nosso sistema',

            'cpf.unique'=>'O CPF já está cadastrado em nosso sistema',
            'cpf.required'  => 'Por favor,preencha seu CPF',


            'rg.unique'=>'O RG já está cadastrado em nosso sistema',
            'rg.required'  => 'Por favor,preencha seu RG',

            'phone.celular_com_ddd'=>'Número Inválido',
            'phone.unique'=>'O telefone já está cadastrado em nosso sistema',

            'adress.required'  => 'Por favor,preencha seu endereço',

        ];
    }
}

 
   

    



