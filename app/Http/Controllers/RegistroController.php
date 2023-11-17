<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegistroController extends Controller
{


    public function index()
    {
        $registros = Registro::all();
        return response()->json($registros);
    }
    public function store(Request $request): JsonResponse
    {
        // Validar los datos comunes
        $request->validate([
            'nombre' => 'required|alpha|max:30',
            'apellido' => 'required|alpha|max:30',
            'fecha_nacimiento' => 'required|date',
            'tipo_usuario' => 'required|string|max:30',
            'email' => 'required|email|unique:registros|max:40',
            'sexo' => 'required|string|max:12',
            'telefono' => 'required|string|max:20',
            'password' => 'required|string|min:12|max:255|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ]);
    
        // Crear un nuevo registro con datos comunes
        $registro = new Registro([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'tipo_usuario' => $request->input('tipo_usuario'),
            'email' => $request->input('email'),
            'sexo' => $request->input('sexo'),
            'telefono' => $request->input('telefono'),
        ]);
    
        // Verificar si la solicitud es JSON
        if ($request->isJson()) {
            // Procesar datos JSON
            $data = $request->json()->all();
            $registro->password = bcrypt($data['password']);
        } else {
            // Procesar datos FormData
            $registro->password = bcrypt($request->input('password'));
        }
    
        // Guardar el registro
        $registro->save();
    
        // Retornar la respuesta JSON sin redirección
        return response()->json(['message' => 'Registro creado con éxito'], 201);
    }
}
