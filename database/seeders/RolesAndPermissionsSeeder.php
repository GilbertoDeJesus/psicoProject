<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // resetear Roles y Permisos almacenados en caché
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // crea roles
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleSuperAdmin = Role::create(['name' => 'Super-Admin']);

        // se guarda en un array todos los permisos
        $arrayOfPermissionNames = ['Ver alumnos sencillo','Ver info alumno sencillo','Buscar alumno sencillo',
        'Ver grupos', 'Ver reporte sencillo','Generar reporte sencillo','Agregar grupo', 'Eliminar grupo',
        'Editar grupo','Editar grupo1','Buscar grupo', 
        'Ver alumnos avanzado','Ver info de alumno avanzado','Buscar alumno avanzado','Ver administradores',
        'Agregar admnistrador','Eliminar administrador','Editar administrador','Editar administrador1',
        'Buscar administrador','Ver programas educativos','Agregar programa educativo',
        'Eliminar programa educativo','Editar programas educativo','Editar programas educativo1',
        'Buscar programa educativo','Eliminar alumnos','Eliminar registros',
        'Ver reporte avanzado','Generar reporte avanzando'];

        //se insertan los permisos a bd
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });
        Permission::insert($permissions->toArray());

        //se asignan los permisos para admin
        $roleAdmin->syncPermissions(['Ver alumnos sencillo','Ver info alumno sencillo','Buscar alumno sencillo',
        'Ver grupos', 'Ver reporte sencillo','Generar reporte sencillo','Agregar grupo', 'Eliminar grupo',
        'Editar grupo','Editar grupo1','Buscar grupo']);
        //se asignan los permisos para super-admin
        $roleSuperAdmin->syncPermissions(['Agregar grupo', 'Eliminar grupo',
        'Editar grupo','Editar grupo1','Buscar grupo', 
        'Ver alumnos avanzado','Ver info de alumno avanzado','Buscar alumno avanzado','Ver administradores',
        'Agregar admnistrador','Eliminar administrador','Editar administrador','Editar administrador1',
        'Buscar administrador','Ver programas educativos','Agregar programa educativo',
        'Eliminar programa educativo','Editar programas educativo','Editar programas educativo1',
        'Buscar programa educativo','Eliminar alumnos','Eliminar registros',
        'Ver reporte avanzado','Generar reporte avanzando']);

        //crear usuario con rol admin
        User::create([
            'name' => "Karla",
            'lastname' => "Francisco",
            'email' => "karla@gmail.com",
            'password' => "karlagmail",
            'educative_program_id' => 6,
            'employee_key' => "karlatics"
        ])->assignRole('Admin');
        //crear usuario con rol super-admin
        User::create([
            'name' => "Elena",
            'lastname' => "Manuel",
            'email' => "elena@gmail.com",
            'password' => "elenagmail",
            'educative_program_id' => 7,
            'employee_key' => "Elenaenf"
        ])->assignRole('Super-Admin');
    }
}
