<?php

namespace App\Repositories;

use App\Models\Voucher as VoucherModel;

use Illuminate\Support\Collection;

class Voucher
{
	public function getAll(): Collection
	{
		return VoucherModel::all();
	}

	public function getById(int $id): VoucherModel
	{
		return VoucherModel::findOrFail($id);
	}

	public function store(array $data): VoucherModel
	{
		\DB::beginTransaction();
		try {
			$voucher = with(new VoucherModel);
			$voucher->fill($data);
			$voucher->save();
			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $voucher;
	}

	public function update(array $data, int $id): VoucherModel
	{
		\DB::beginTransaction();
		try {
			$voucher = VoucherModel::findOrFail($id);
			$voucher->fill($data);
			$voucher->save();
			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $voucher;
	}

	public function destroy(int $id)
	{
		return VoucherModel::findOrFail($id)->delete();
	}

	public function parseForList(Collection $vouchers): Collection
	{
		return $vouchers->map(function ($item, $key) {
			$voucher = app(\stdClass::class);
			$voucher->id = $item->id;
			$voucher->code = $item->code;
			$voucher->discount_percentage = $item->discount_percentage;
			$voucher->used = ($item->used === 1) ? true : false;

			return $voucher;
		});
	}
}