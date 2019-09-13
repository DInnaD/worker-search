<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Organization;
use App\Vacancy;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

	  // $this->call(RoleTableSeeder::class);
	  // $this->call(CompanyTableSeeder::class);
	  // $this->call(PositionTableSeeder::class);

    $role_admin = 'admin';
    $role_worker = 'worker';
    $role_employer  = 'employer';
    $admin = new User();
    $admin->first_name = 'Inna';
    $admin->email = 'admin@gmail.com';
    $admin->password = Hash::make('123456');
    $admin->role = $role_admin;
    $admin->save();




		factory(User::class, 50)->create()->each(function (User $user) {


			factory(Organization::class)->create([
	            		'creator_id' => $user->id,
	            	])->each(function (Organization $organization) {

	        	factory(Vacancy::class, 2)->create([
	            		'organization_id' => $organization->id,
	            	]);
	        });
	    });

        factory(User::class, 50)->create()->each(function (User $user) {//??????

                $digits = collect([random_int(1, 100), random_int(1, 100), random_int(1, 100), random_int(1, 100) ])->unique();
                        foreach ($digits as $digit) {
                            # code...
                            $user->positions()->attach($digit);
                        }
               
        });



    }
}