<?php

namespace Database\Seeders;

use App\Models\Registro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Registro::create([
            'nombre' => 'Jhon Smith',
            'apellido' => 'Meneses',
            'fecha_nacimiento' => '1990-01-01',
            'tipo_usuario' => 'Jugador',
            'email' => 'jhon.smith@example.com',
            'sexo' => 'Masculino',
            'telefono' => '3106607780',
            'password' => bcrypt('12345678'),
        ]);
    
        Registro::create([
            'nombre' => 'Alice',
            'apellido' => 'Johnson',
            'fecha_nacimiento' => '1985-03-15',
            'tipo_usuario' => 'Cliente',
            'email' => 'alice.johnson@example.com',
            'sexo' => 'Femenino',
            'telefono' => '1234567890',
            'password' => bcrypt('password123'),
        ]);
    
        Registro::create([
            'nombre' => 'Bob',
            'apellido' => 'Williams',
            'fecha_nacimiento' => '1988-07-22',
            'tipo_usuario' => 'Cliente',
            'email' => 'bob.williams@example.com',
            'sexo' => 'Masculino',
            'telefono' => '9876543210',
            'password' => bcrypt('qwerty789'),
        ]);
    
        Registro::create([
            'nombre' => 'Eva',
            'apellido' => 'Davis',
            'fecha_nacimiento' => '1992-12-10',
            'tipo_usuario' => 'Jugador',
            'email' => 'eva.davis@example.com',
            'sexo' => 'Femenino',
            'telefono' => '5551112233',
            'password' => bcrypt('abcdef123'),
        ]);
    
        // Puedes agregar más registros según tus necesidades
    }
}
