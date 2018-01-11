<?php

namespace App\Providers\Validation;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class CustomValidation extends Validator {
	public function ValidateUniqueWith($attribute, $value, $parameters) {
		$result = DB::table($parameters[0])
			->where(function($query) use ($attribute, $value, $parameters) {
				$query->where($attribute, '=', $value)
					->orWhere(($parameters[1]), '=', $value);
			})->first();

		return $result ? false : true;
	}
}