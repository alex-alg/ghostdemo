<?php

namespace App\Helpers;

use App\User as UserModel;

use Illuminate\Support\Collection;

class User
{
	public function isAdmin(UserModel $user): bool
	{
		return $user->is_admin === 1;
	}
}