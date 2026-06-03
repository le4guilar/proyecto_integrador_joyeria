<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    //Muestra el panel principal del cliente
    public function dashboard(){

        //se consigue el ID del usuario que esta navegando en la web en ese momento
        $usuarioLogueadoId = Auth::id(); 

        //va a Dbeaver y busca solo las ordenes que el pertenezcan a ese cliente
        $misOrdenes = Orden::where('usuario_id', $usuarioLogueadoId)->get();

        //se abre la pantalla del cliente y le pasamos sus ordenes usando compact
        return view('Cliente.Cliente', compact('misOrdenes'));



    }

   

}
