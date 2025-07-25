<?php

namespace App\Services\Contracts;
use App\Registers\Menu;

interface MenuServiceInterface
{
    public function register(array $credential):Menu;
    
}