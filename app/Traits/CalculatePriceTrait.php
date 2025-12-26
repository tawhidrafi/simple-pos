<?php

namespace App\Traits;

trait CalculatePriceTrait
{
    public function calculate($taxType, $tax, $discount, $commissionRate)
    {
        $cost = $this->cost;

        $basePrice = $cost - ($cost * ($discount / 100));

        if ($taxType == 'inclusive') {
            $taxAmount = $basePrice * ($tax / (100 + $tax));
            $priceBeforeTax = $basePrice;
        } else {
            $taxAmount = $basePrice * ($tax / 100);
            $priceBeforeTax = $basePrice + $taxAmount;
        }

        $commissionAmount = $priceBeforeTax * ($commissionRate / 100);

        $finalPrice = $priceBeforeTax + $commissionAmount;

        $this->price = $finalPrice;

        $this->save();
    }
}
