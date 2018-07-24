<?php

use Illuminate\Database\Seeder;

use App\Repositories\Voucher as VoucherRepo;

class VoucherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		$voucherRepo = app(VoucherRepo::class);

		$vouchers = [
			[
				'code'					=> 'abc',
				'discount_percentage'	=> 5
			],
			[
				'code'					=> 'xyz',
				'discount_percentage'	=> 10
			],
			[
				'code'					=> '123',
				'discount_percentage'	=> 15
			]
		];

		foreach ($vouchers as $key => $voucher) {
			$voucherRepo->store($voucher);
		}
	}
}
