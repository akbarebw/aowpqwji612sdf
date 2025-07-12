<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $routes = [];
        // foreach (\Route::getRoutes() as $route){
        //     if($route->getName() != null){
        //         $text = explode('.',$route->getName());
        //         if(isset($text[1])){
        //             if($text[1] == 'index' || $text[1] == 'create' || $text[1] =='edit' || $text[1] =='destroy'){
        //                 $routes[] = $route->getName();
        //             }
        //         }
        //     }
        // }

        // foreach ($routes as $item){
        //     $cekData = Permission::where('name',$item)->first();
        //     if(!$cekData){
        //         Permission::create([
        //             'name'=> $item,
        //             'guard_name'=> 'web',
        //         ]);
        //     }
        // }

        $this->call([
            LembagaPengangkatanSeeder::class,
            IkatanKerjaSdmSeeder::class,
            TahunAjaranSeeder::class,
            ProdiSeeder::class,
            JenisKeluarSeeder::class,
            AlatTranfortasiSeeder::class,
            StatusKeaktifanPegawaiSeeder::class,
            AgamaSeeder::class,
            // PermissionSeeder::class,
            RoleSeeder::class,
            // UserSeeder::class,
            StatusMahasiswaSeeder::class,
            // Pegawaiseeder::class,

        ]);

    }
}
