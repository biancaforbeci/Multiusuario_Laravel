<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest:admin')->except('logout');
    }

    public function login(Request $request){
       // validar o dado que vem do formulario
       $this->validate($request, [
         'email' => 'required|string',
         'password' => 'required',
       ]);

       // tentar logar
       $credentials = [
         'email' => $request->email,
         'password' => $request->password
       ];

       $authOK = Auth::guard('admin')->attempt($credentials, $request->remember); //utiliza o guard do admin

       if($authOK){
         // Quando um usuário tenta acessar uma página que necessita de login
         // e o Laravel redireciona direto pro login, essa página é mantida
         // pelo framework e pode ser chamada através do método redirect()->intended()
         // Se nao houver nenhuma página requisitada anterior ao login,
         // o Laravel redireciona para a rota passada por parâmetro
         return redirect()->intended(route('admin.dashboard'));
       }

  // redirecionar novamente para o login, passando novamente os parametros do request
      return redirect()->back()->withInputs($request->only('email','remember'));
    }

    public function index(){
      return view("auth.admin-login");
    }
}
