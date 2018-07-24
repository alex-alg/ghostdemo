<?php

namespace App\Repositories;

use App\Models\Plan as PlanModel;

use Illuminate\Support\Collection;

class Plan
{
	public function getAll(): Collection
	{
		return PlanModel::all();
	}

	public function getById(int $id): PlanModel
	{
		return PlanModel::findOrFail($id);
	}

	public function store(array $data): PlanModel
	{
		\DB::beginTransaction();
		try {
			$plan = with(new PlanModel);
			$plan->fill($data);
			$plan->save();

			if(!empty($data['feature_ids'])){
				$plan->features()->sync($data['feature_ids']);
			}

			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $plan;
	}

	public function update(array $data, int $id): PlanModel
	{
		\DB::beginTransaction();
		try {
			$plan = PlanModel::findOrFail($id);
			$plan->fill($data);
			$plan->save();


			if(!empty($data['feature_ids'])){
				$plan->features()->sync($data['feature_ids']);
			}

			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $plan;
	}

	public function destroy(int $id)
	{
		return PlanModel::findOrFail($id)->delete();
	}
}