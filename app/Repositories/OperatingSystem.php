<?php

namespace App\Repositories;

use App\Models\OperatingSystem as OperatingSystemModel;

use Illuminate\Support\Collection;

class OperatingSystem
{
	public function getAll(): Collection
	{
		return OperatingSystemModel::all();
	}

	public function getById(int $id): OperatingSystemModel
	{
		return OperatingSystemModel::findOrFail($id);
	}

	public function store(array $data): OperatingSystemModel
	{
		\DB::beginTransaction();
		try {
			$os = with(new OperatingSystemModel);
			$os->fill($data);
			$os->save();
			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $os;
	}

	public function update(array $data, int $id): OperatingSystemModel
	{
		\DB::beginTransaction();
		try {
			$os = OperatingSystemModel::findOrFail($id);
			$os->fill($data);
			$os->save();
			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $os;
	}

	public function destroy(int $id)
	{
		return OperatingSystemModel::findOrFail($id)->delete();
	}
}