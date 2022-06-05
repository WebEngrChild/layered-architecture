<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use App\Domain\Customer\Entity\Customer;

class CustomerService
{
    private $customer;

    public function __construct(CustomerRepositoryInterface $customer)
    {
        $this->customer = $customer;
    }

    public function exists(string $name): bool
    {
        if (!$this->customer->findByName($name)) {
            return false;
        }
        return true;
    }

    public function store(string $name, string $address ): int
    {
        return $this->customer->store(new Customer(null, $name, $address));
    }
}
