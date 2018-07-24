<?php

use Illuminate\Database\Seeder;

use App\Repositories\Plan as PlanRepo;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		$planRepo = app(PlanRepo::class);

		$plans = [
			[
				'data' 			=> ['name' => 'Basic', 'operating_system_id' => 1],
				'feature_ids'	=> [1]
			],
			[
				'data' 			=> ['name' => 'Advanced', 'operating_system_id' => 1],
				'feature_ids'	=> [1, 2, 3]
			],
			[
				'data' 			=> ['name' => 'Basic', 'operating_system_id' => 2],
				'feature_ids'	=> [4]
			],
			[
				'data' 			=> ['name' => 'Advanced', 'operating_system_id' => 2],
				'feature_ids'	=> [4, 5, 6]
			]
		];

		foreach ($plans as $plan) {
			$planRepo->store($plan['data'], $plan['feature_ids']);
		}
	}
}
