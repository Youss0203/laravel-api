<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo = [
            'FrontEnd',
            'BackEnd',
            'FullStack'
        ];

        foreach($tipo as $nomeTipo) {
            $type = new Type();
            $type->tipo = $nomeTipo;
            $type->save();
        }
    }
}