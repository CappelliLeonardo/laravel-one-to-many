<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//MODELS

use App\Models\Type;

//Helpers
use Illuminate\Support\Facades\Schema;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $allTypes = [
            'HTML',
            'CSS',
            'Java  script',
            'Vue',
            'SQL',
            'PHP',
            'Laravel'
        ];

        foreach ($allTypes as $singleType) {
            $type= Type::create([
                'title'=> $singleType,
                'slug'=> str()->slug($singleType)
            ]);
        }
    }
}
