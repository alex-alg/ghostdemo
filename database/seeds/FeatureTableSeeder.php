<?php

use Illuminate\Database\Seeder;

use App\Repositories\Feature as FeatureRepo;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		$featureRepo = app(FeatureRepo::class);

		$features = [
			[
				'name'	=> 'Hide Your IP',
				'price'	=> 50
			],
			[
				'name'	=> 'WiFi Protection',
				'price'	=> 51
			],
			[
				'name'	=> 'No Logs Policy',
				'price'	=> 52
			],
			[
				'name'	=> 'Secure Transactions and Conversations',
				'price'	=> 53
			],
			[
				'name'	=> 'Access Restricted Content',
				'price'	=> 54
			],
			[
				'name'	=> 'Block Ads',
				'price'	=> 55
			],
			[
				'name'	=> 'Block Malicious Content',
				'price'	=> 56
			],
			[
				'name'	=> 'Block Online Tracking',
				'price'	=> 57
			]
		];

		foreach ($features as $key => $feature) {
			$featureRepo->store($feature);
		}
	}
}
