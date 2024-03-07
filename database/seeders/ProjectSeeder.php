<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Models
use App\Models\Project;

//utilizziamo il model type per "rendere disponibile la tabella type nel db"
use App\Models\Type;
//Helpers
use Illuminate\Support\Str;
//Helpers
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();
        
            for ($i = 0; $i < 10; $i++) {
                $titleForMassAssignment = fake()->sentence();
                $slugForMassAssignment = Str::slug($titleForMassAssignment);
                $postWithMassAssignment = Project::create([
                'title' => $titleForMassAssignment,
                'slug' => $slugForMassAssignment,
                'content' => fake()->paragraph(),
                'type_id'=> Type::inRandomOrder()->first()->id,
            ]);
        }
            
    }
}
