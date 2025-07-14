<?php

namespace App\Services;

interface LoginServiceInterface 
{
    public function login(array  $credentials): array;
}