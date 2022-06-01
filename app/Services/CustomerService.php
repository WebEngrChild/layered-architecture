<?php

declare(strict_types=1);

namespace App\Services;

use App\DataProvider\Eloquent\Customer;

class CustomerService
{

    public function exists(string $name): bool
    {
        $count = Customer::whereName($name)->count();
        if ($count > 0) {
            return true;
        }
        return false;
    }

    public function store(string $name, string $address ): int
    {
        $customer = Customer::create(
            [
                'name' => $name,
                'address' => $address,
            ]
        );
        return  (int)$customer->id;
    }
}
