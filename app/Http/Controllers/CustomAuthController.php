<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { //realiza una autenticacion de laravel -> retorna true o false
            //tambien se encarga de guardar la sesion del usuario
            return redirect()->intended('dashboard') //redirige al usuario 
                ->withSuccess('logueado');          //muestra un mensaje al user
        }

        return redirect("login")->with('error', 'credenciales invalidas');
    }

    public function registration()
    {
        return view('auth.register'); //retorna a una vista *auth es por la carpeta
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data); //pasa la data a create

        return redirect("dashboard")->withSuccess('registrado!');
    }

    public function create(array $data)
    {
        return User::create([ //aca lo crea
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) { //verifica que el usuario este en sesion (guarda la sesion en una cookie o similar luego la envia)

            //asi obtenemos los datos del que quiere entrar y asi poder verificar otros permisos por ej grupos y eso
            /*$id = Auth::user()->id;
            $name = Auth::user()->name;
            $email = Auth::user()->email;*/

            $menus = [
                [
                    'titulo' => 'Producto',
                    'submenu' => [
                        [
                            'titulo' => 'Listado Producto',
                            'tipo' => 'modal',
                            'componente' => 'modal-lst-productos.blade',
                            'modal' => 'modalLstProd'
                        ],
                        [
                            'titulo' => 'Agregar Producto',
                            'tipo' => 'modal',
                            'componente' => 'modal-productos3.blade',
                            'modal' => 'modalProductos',
                            'data' => [
                                'title' => 'Nuevo Producto'
                            ]
                        ]
                    ]
                ]
            ];

            return view('auth.dashboard', ['menus' => $menus]);
        }
        return redirect("login")->with('error', 'no tienes permisos');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

    public function lstUsers(Request $request)
    {
        if (Auth::check()) {

            $email = $request->input('email');
            $nombre = $request->input('nombre');

            //armamos el filtro segun lo que venga
            $query = User::query();

            if ($email != '') {
                $query->where('email', $email);
            }

            if ($nombre != '') {
                $query->where('name', $nombre);
            }

            $users = $query->get();

            return view('auth.lstusers', ['users' => $users]);
        }

        return redirect("login")->with('error', 'no tienes permisos');
    }
}
