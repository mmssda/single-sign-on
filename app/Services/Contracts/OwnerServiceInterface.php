<?php

namespace App\Services\Contracts;

interface OwnerServiceInterface 
{
    public function login(array  $credentials): bool;
}