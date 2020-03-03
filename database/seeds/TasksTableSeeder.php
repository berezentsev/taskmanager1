<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert(
            [
                [
                    'uuid'=>'4a585b5e-5220-4b1d-92e2-316f88210481',
                    'title'=>'Task1',
                    'tags'=>json_encode(['hello']),
                    'description'=>'Description Task1'
                ],
                [
                    'uuid'=>'4b585b5f-5220-4b1d-92f2-316f88210482',
                    'title'=>'Task2',
                    'tags'=>json_encode(['hello']),
                    'description'=>'Description Task2'
                ],
                [
                    'uuid'=>'4c585b5g-5220-4b1d-92g2-316f88210483',
                    'title'=>'Task3',
                    'tags'=>json_encode(['hello']),
                    'description'=>'Description Task3'
                ]
            ]
        );
    }
}
