<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->image = 'images/' . $faker->image('storage/app/public/images/', fullPath: false, category: 'Projects', format: 'jpg',);
            $newProject->description = $faker->paragraphs(asText: true);
            $newProject->link_project = $faker->url(); 
            $newProject->link_website = $faker->url(); 
            $newProject->save();
         }
    }
}
