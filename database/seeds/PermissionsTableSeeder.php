<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
    	Permission::create([
    		'name'			=>	'Navegar usuarios',
    		'slug'			=>	'users.index',
    		'description'	=>	'Lista y navega todos los usuarios del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Ver dealle de usuario',
    		'slug'			=>	'users.show',
    		'description'	=>	'Ver detalle de cada usuario del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Edición de usuarios',
    		'slug'			=>	'users.edit',
    		'description'	=>	'Editar cualquier dato de un usuario del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Eliminar usuario',
    		'slug'			=>	'users.destroy',
    		'description'	=>	'Eliminar cualquier usuario del sistema',
    	]);

    	//Roles
    	Permission::create([
    		'name'			=>	'Navegar roles',
    		'slug'			=>	'roles.index',
    		'description'	=>	'Lista y navega todos los roles del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Ver dealle de rol',
    		'slug'			=>	'roles.show',
    		'description'	=>	'Ver detalle de cada rol del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Creación roles',
    		'slug'			=>	'roles.create',
    		'description'	=>	'Crea un rol del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Edición de roles',
    		'slug'			=>	'roles.edit',
    		'description'	=>	'Editar cualquier dato de un rol del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Eliminar rol',
    		'slug'			=>	'roles.destroy',
    		'description'	=>	'Eliminar cualquier rol del sistema',
    	]);

    	//Pages
    	Permission::create([
    		'name'			=>	'Navegar paginas',
    		'slug'			=>	'pages.index',
    		'description'	=>	'Lista y navega todos los paginas del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Ver dealle de pagina',
    		'slug'			=>	'pages.show',
    		'description'	=>	'Ver detalle de cada pagina del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Creación de paginas',
    		'slug'			=>	'pages.create',
    		'description'	=>	'Crea una pagina del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Edición de paginas',
    		'slug'			=>	'pages.edit',
    		'description'	=>	'Editar cualquier dato de un pagina del sistema',
    	]);
    	Permission::create([
    		'name'			=>	'Eliminar pagina',
    		'slug'			=>	'pages.destroy',
    		'description'	=>	'Eliminar cualquier pagina del sistema',
    	]);
    }
}
