<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(){
        //automaticamente envia al formulario si no pasa la validacion con informacion de los errores.
    	request()->validate([
    		'name' => 'required',  //no null
    		'email' => 'required|email'
    		]);

        //AQUI APREDIBLE ENVIA UN CORREO ELECTRONICO CON EL MENSAJE

    //	return "formulario enviado por correo electronico "; problemas con el refrescar pagina. pide reenviar peticion.
    return back()->with('MensajeStatus','Recibimos tu correo Electronico, te responderemos en la brevedad posible.'); //Guarda mensaje con la llave mensageStatus en la session del usuario.
    }

}
