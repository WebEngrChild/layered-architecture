<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Services\CustomerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerCreateAction
{
    private CustomerService $customer;

    public function __construct(CustomerService $customer)
    {
        $this->customer = $customer;
    }

    public function __invoke(Request $request): Response
    {
        if ($this->customer->exists($request->name)) {
            return response('', Response::HTTP_OK);
        }

        $id = $this->customer->store($request->name, $request->address);
        return response('', Response::HTTP_CREATED)
            ->header('location', '/api/customer' . $id);
    }
}
