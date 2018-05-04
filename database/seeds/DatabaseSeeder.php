<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relationships = factory(App\Relationship::class, 10)->create();
        $towers = factory(App\Tower::class, 3)->create();
        $petTypes = factory(App\PetType::class, 3)->create();

        $properties = factory(App\Property::class, 100)
        	->create([
        		'tower_id' => random_int(1, 3),
        	]);

        $properties->each(function(App\Property $property) use ($properties){
        	// $users = factory(App\User::class)
        	// 	->times(1)
        	// 	->create([
        	// 		'property_id' => $property->id,
        	// 	]);

        	$habitants = factory(App\Habitant::class, random_int(2, 6))
        		->create([
        			'property_id' => $property->id,
        			'relationship_id' => random_int(2, 10),
        		]);

        	$vehicles = factory(App\Vehicle::class, random_int(1, 2))
        		->create([
        			'property_id' => $property->id,
        		]);
        });
    }
}
