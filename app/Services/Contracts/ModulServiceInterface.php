<?php

namespace App\Services\Contracts;
use App\Registers\Modul;
use Illuminate\Support\Collection;

interface ModulServiceInterface 
{
    public function register(array $credential):Modul;

    public function show(int $id):Modul;

    public function index():Collection;

}

