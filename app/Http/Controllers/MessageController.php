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
    	return "formulario procesado Pero no guardado en la BD aun";
    }
}
