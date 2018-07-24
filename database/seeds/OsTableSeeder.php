<?php

use Illuminate\Database\Seeder;

use App\Repositories\OperatingSystem as OperatingSystemRepo;

class OsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		$osRepo = app(OperatingSystemRepo::class);

		$oses = [
			'Windows',
			'macOS',
			'iOS',
			'Linux',
			'Android'
		];


		foreach ($oses as $key => $osName) {
			$osRepo->store([
				'name' => $osName
			]);
		}
	}
}
