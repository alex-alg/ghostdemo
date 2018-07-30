<?php

namespace App\Rules\Voucher;

use Illuminate\Contracts\Validation\Rule;

use App\Repositories\Voucher as VoucherRepo;

class VoucherCodeExists implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !is_null(app(VoucherRepo::class)->getByCode($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The voucher code does not exist.';
    }
}
