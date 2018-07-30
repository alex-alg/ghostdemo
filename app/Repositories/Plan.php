<?php

namespace App\Repositories;

use App\Models\Plan as PlanModel;

use App\Helpers\Detection;

use App\Repositories\OperatingSystem as OperatingSystemRepo;

use App\Http\Resources\Plan as PlanResource;

use Illuminate\Support\Collection;

class Plan
{
	public function store(array $data, array $featureIds): PlanModel
	{
		\DB::beginTransaction();
		try {
			$plan = with(new PlanModel);
			$plan->fill($data);
			$plan->save();

			if(!empty($featureIds)){
				$plan->features()->sync($featureIds);
			}

			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $plan;
	}

	public function update(array $data, int $id, array $featureIds): PlanModel
	{
		\DB::beginTransaction();
		try {
			$plan = PlanModel::findOrFail($id);
			$plan->fill($data);
			$plan->save();


			if(!empty($featureIds)){
				$plan->features()->sync($featureIds);
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

	public function getAll(): Collection
	{
		return PlanModel::all();
	}

	public function getById(int $id): PlanModel
	{
		return PlanModel::findOrFail($id);
	}

	public function getByOs(): Collection
	{
		$plans = $this->getAll();

        $osFullName = app(Detection::class)->getOS($_SERVER['HTTP_USER_AGENT']);
        $osName = explode(' ', $osFullName)[0];
        $os = app(OperatingSystemRepo::class)->getByName($osName);

        $plans = $this->filterByOs($plans, $os->id);

        return $plans;
	}

	public function filterByOs(Collection $plans, int $osId): Collection
	{
		return $plans->filter(function($item, $key) use ($osId){
			return $item->operating_system_id === $osId;
		});
	}

	public function parseForList(Collection $plans)
	{
		return PlanResource::collection($plans);
	}
}