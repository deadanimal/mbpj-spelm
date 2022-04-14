<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::create(
            [
            'name'=> 'kakitangan',
            'nric'=> '909090905121',
            'email'=> '123@gmail.com',
            'department_code'=> '171100',
            'user_code'=> '10490',
            'password'=>'$2y$10$ZjAJrgAdfaEdS6SA2PkZP.gpZQS.anOqHqnhZed51XM35Vs1/3Veq',
            'status'=>'aktif',
            'role'=>'kakitangan'
            ]
        );
        User::create(
            [
            'name'=> 'penyelia',
            'nric'=> '909090905122',
            'email'=> '123@gmail.com',
            'department_code'=> '171100',
            'user_code'=> '10490',
            'password'=>'$2y$10$ZjAJrgAdfaEdS6SA2PkZP.gpZQS.anOqHqnhZed51XM35Vs1/3Veq',
            'status'=>'aktif',
            'role'=>'penyelia'
            ]
        );
        User::create(
            [
            'name'=> 'admin',
            'nric'=> '909090905123',
            'email'=> '123@gmail.com',
            'department_code'=> '171100',
            'user_code'=> '10490',
            'password'=>'$2y$10$ZjAJrgAdfaEdS6SA2PkZP.gpZQS.anOqHqnhZed51XM35Vs1/3Veq',
            'status'=>'aktif',
            'role'=>'pentadbir_sistem'
            ]
        );
        User::create(
            [
            'name'=> 'kb',
            'nric'=> '909090905124',
            'email'=> '123@gmail.com',
            'department_code'=> '171100',
            'user_code'=> '10490',
            'password'=>'$2y$10$ZjAJrgAdfaEdS6SA2PkZP.gpZQS.anOqHqnhZed51XM35Vs1/3Veq',
            'status'=>'aktif',
            'role'=>'ketua_bahagian'
            ]
        );
        User::create(
            [
            'name'=> 'kj',
            'nric'=> '909090905125',
            'email'=> '123@gmail.com',
            'department_code'=> '171100',
            'user_code'=> '10490',
            'password'=>'$2y$10$ZjAJrgAdfaEdS6SA2PkZP.gpZQS.anOqHqnhZed51XM35Vs1/3Veq',
            'status'=>'aktif',
            'role'=>'ketua_jabatan'
            ]
        );
        User::create(
            [
            'name'=> 'KP',
            'nric'=> '909090905126',
            'email'=> '123@gmail.com',
            'department_code'=> '171100',
            'user_code'=> '10490',
            'password'=>'$2y$10$ZjAJrgAdfaEdS6SA2PkZP.gpZQS.anOqHqnhZed51XM35Vs1/3Veq',
            'status'=>'aktif',
            'role'=>'kerani_pemeriksa'
            ]
        );
        User::create(
            [
            'name'=> 'KS',
            'nric'=> '909090905127',
            'email'=> '123@gmail.com',
            'department_code'=> '171100',
            'user_code'=> '10490',
            'password'=>'$2y$10$ZjAJrgAdfaEdS6SA2PkZP.gpZQS.anOqHqnhZed51XM35Vs1/3Veq',
            'status'=>'aktif',
            'role'=>'kerani_semakan'
            ]
        );
        User::create(
            [
            'name'=> 'PP',
            'nric'=> '909090905128',
            'email'=> '123@gmail.com',
            'department_code'=> '171100',
            'user_code'=> '10490',
            'password'=>'$2y$10$ZjAJrgAdfaEdS6SA2PkZP.gpZQS.anOqHqnhZed51XM35Vs1/3Veq',
            'status'=>'aktif',
            'role'=>'pelulus_pindaan'
            ]
        );
        User::create(
            [
            'name'=> 'DB',
            'nric'=> '909090905129',
            'email'=> '123@gmail.com',
            'department_code'=> '171100',
            'user_code'=> '10490',
            'password'=>'$2y$10$ZjAJrgAdfaEdS6SA2PkZP.gpZQS.anOqHqnhZed51XM35Vs1/3Veq',
            'status'=>'aktif',
            'role'=>'datuk_bandar'
            ]
        );
    }
}
