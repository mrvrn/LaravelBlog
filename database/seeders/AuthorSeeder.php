<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('authors')->insert([
            [
                'firstname' => 'Merve', 
                'infix'     => '',
                'lastname'  => 'Eren',
                'biography' => 'Merve Eren is een schrijfster die al jarenlang ervaring heeft in het schrijven van boeken. Ze heeft al meerdere boeken geschreven en is een bekende schrijfster in Nederland.',
                'role_id'   => '1',
            ],
            [
                'firstname' => 'Dani',
                'infix' => 'van der',
                'lastname' => 'Linden',
                'biography' => 'Dani van der Linden is een schrijver die al jarenlang ervaring heeft in het schrijven van boeken. Hij heeft al meerdere boeken geschreven en is een bekende schrijver in Nederland.',
                'role_id'   => '1',
            ],
            [
                'firstname' => 'Luna',
                'infix' => '',
                'lastname' => 'Smedes',
                'biography' => 'Luna Smedes is een schrijfster die al jarenlang ervaring heeft in het schrijven van boeken. Ze heeft al meerdere boeken geschreven en is een bekende schrijfster in Nederland.',
                'role_id'   => '2',
            ],
            [
                'firstname' => 'Koen',
                'infix' => '',
                'lastname' => 'Smit',
                'biography' => 'Koen Smit is een schrijver die al jarenlang ervaring heeft in het schrijven van boeken. Hij heeft al meerdere boeken geschreven en is een bekende schrijver in Nederland.',
                'role_id'   => '2',
            ],
            [
                'firstname' => 'Nicky',
                'infix' => '',
                'lastname' => 'Slager',
                'biography' => 'Nicky Slager is een schrijfster die al jarenlang ervaring heeft in het schrijven van boeken. Ze heeft al meerdere boeken geschreven en is een bekende schrijfster in Nederland.',
                'role_id'   => '2',
            ],
        ]);

    }
}
