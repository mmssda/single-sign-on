<?php 

namespace App\Services\Contracts;
use App\Registers\ApplicationUser;
interface ApplicationUserInterface 
{
    public function register(array $credential):ApplicationUser;

    public function show(int $id):ApplicationUser;
}