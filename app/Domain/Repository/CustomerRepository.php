<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use \App\DataProvider\CustomerRepositoryInterface;
use \App\DataProvider\Eloquent\Customer as EloquentCustomer;
use App\Domain\Entity\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    private $eloquentCustomer;

    public function __construct(EloquentCustomer $eloquentCustomer)
    {
        $this->eloquentCustomer = $eloquentCustomer;
    }

    public function findByName(string $name): ?Customer
    {
        $record = $this->eloquentCustomer->whereName($name)->firts();
        if($record === null) {
            return null;
        }

        return new Customer(
            $record->id,
            $record->name,
            $record->address,
        );
    }


    public function store(Customer $customer): int
    {
        $eloquent = $this->eloquentCustomer->newInstance();
        $eloquent->name = $customer->getName();
        $eloquent->address = $customer->getAddress();
        $eloquent->save();

        return (int)$eloquent->id;
    }
}
