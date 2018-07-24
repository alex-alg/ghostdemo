<?php

namespace App\Repositories;

use App\Models\Feature as FeatureModel;

use Illuminate\Support\Collection;

class Feature
{
	public function getAll(): Collection
	{
		return FeatureModel::all();
	}

	public function getById(int $id): FeatureModel
	{
		return FeatureModel::findOrFail($id);
	}

	public function store(array $data): FeatureModel
	{
		\DB::beginTransaction();
		try {
			$feature = with(new FeatureModel);
			$feature->fill($data);
			$feature->save();
			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $feature;
	}

	public function update(array $data, int $id): FeatureModel
	{
		\DB::beginTransaction();
		try {
			$feature = FeatureModel::findOrFail($id);
			$feature->fill($data);
			$feature->save();
			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $feature;
	}

	public function destroy(int $id)
	{
		return FeatureModel::findOrFail($id)->delete();
	}
}