<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegistroController extends Controller
{


    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
   
    public function guardar(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:30|min:4|regex:/^[a-zA-Z]+$/',
            'fecha_nacimiento' => 'required|date_format:d/m/Y',
            'tipo_usuario' => 'required|string|max:30',
            'sexo' => 'required|string|min:3|max:12|regex:/^[a-zA-Z]+$/',
            'telefono' => 'required|string|min:8|max:10|regex:/^[0-9]+$/',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:7|max:20',
        ]);
    
        $user = new User([
            'name' => $request->input('name'),
            'apellido' => $request->input('apellido'),
            'fecha_nacimiento' => Carbon::createFromFormat('d/m/Y', $request->input('fecha_nacimiento'))->toDateString(),
            'tipo_usuario' => $request->input('tipo_usuario'),
            'sexo' => $request->input('sexo'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    
        $user->save();
    
        return response()->json(['message' => 'Usuario creado con éxito'], 201);
    }



}
