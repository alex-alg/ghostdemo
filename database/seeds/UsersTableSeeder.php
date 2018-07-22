<?php

use Illuminate\Database\Seeder;

use App\Repositories\User as UserRepo;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		$adminUserData = [
			'name'			=> 'admin',
			'email'			=> 'admin@ghost.ro',
			'password'		=> bcrypt('test123'),
			'is_admin'		=> 1
		];

		$userRepo = app(UserRepo::class);
		$userRepo->store($adminUserData);
	}
}
