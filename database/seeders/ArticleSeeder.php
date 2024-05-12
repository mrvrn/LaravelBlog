<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('articles')->insert([
        //     [
        //         'title' => 'Test', 
        //         'description' => 'testttttttttttttt',
        //         'image'  => '',
        //         'author_id' => '1',
        //         'category_id'   => '1'
        //     ], 
        //     [
        //         'title' => 'Test2', 
        //         'description' => 'testttttttttttttt',
        //         'image'  => '',
        //         'author_id' => '2',
        //         'category_id'   => '1'
        //     ],
        //     [
        //         'title' => 'Test3', 
        //         'description' => 'testttttttttttttt',
        //         'image'  => '',
        //         'author_id' => '3',
        //         'category_id'   => '1'
        //     ],
        //     [
        //         'title' => 'Test4', 
        //         'description' => 'testttttttttttttt',
        //         'image'  => '',
        //         'author_id' => '4',
        //         'category_id'   => '1'
        //     ],
        //     [
        //         'title' => 'Test5', 
        //         'description' => 'testttttttttttttt',
        //         'image'  => '',
        //         'author_id' => '5',
        //         'category_id'   => '1'
        //     ],
            
        // ]);
    }
}