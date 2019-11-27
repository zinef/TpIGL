<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'identifiant' => 'zizou',
                'name'=> 'Zine-eddine',
                'surname' => 'fodil',
                'email' => 'hz_fodil@esi.dz',
                'telephone' => '0791254348',
                'adresse' => 'Boghni',
                'dateDeNaissance' => '14-02-1999',
                'nationalite' => 'Algerien',
                'password' => bcrypt('123456')
            ],
            [
                'identifiant' => 'dja',
                'name'=> 'Djamel eddine',
                'surname' => 'Sebbagh',
                'email' => 'hd_sebbagh@esi.dz',
                'telephone' => '0658363772',
                'adresse' => 'Skikda',
                'dateDeNaissance' => '30-01-1999',
                'nationalite' => 'Algerien',
                'password' => bcrypt('123456')
            ]
        ]);
    }
}
