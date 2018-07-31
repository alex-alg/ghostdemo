<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Voucher as VoucherRepo;

class Plan extends JsonResource
{
    public function getPlanPrice(): int
    {
        $price = 0;

        foreach ($this->features as $feature) {
            $price += $feature->price;
        }

        return $price;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'os'            => $this->operating_system->name,
            'features'      => $this->features,
            'price'         => $this->getPlanPrice()
        ];
    }
}
