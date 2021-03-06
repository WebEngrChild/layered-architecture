<?php

declare(strict_types=1);

namespace App\Domain\Customer\Repository;

use App\Domain\Customer\Entity\Customer;

interface CustomerRepositoryInterface
{
    public function findByName(string $name): ?Customer;

    public function store(Customer $customer): int;
}
