<?php

declare(strict_types=1);

namespace App\Domain\Entity;

class Customer
{
    protected ?int $id;
    protected string $name;
    protected string $address;

    public function __construct(?int $id, string $name, string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
