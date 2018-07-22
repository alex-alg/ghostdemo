<?php

namespace App\Repositories;

use App\User as UserModel;

use Illuminate\Support\Collection;

class User {

	public function store(array $data): UserModel
	{
		\DB::beginTransaction();
		try {
			$user = with(new UserModel);
			$user->fill($data);
			$user->save();
			\DB::commit();
		} catch(\Exception $e) {
			\DB::rollBack();
			throw $e;
		}

		return $user;
	}
}