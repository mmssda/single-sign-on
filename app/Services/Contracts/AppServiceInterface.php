<?php

namespace App\Services\Contracts;
use App\Registers\ClientApp;
use Symfony\Component\HttpKernel\Client;
use Illuminate\Support\Collection;

interface AppServiceInterface {

    public function register(array $data): ClientApp;
    
    public function validateClient(string $clientId, string $redirectUri): bool;

    public function show(int $id):ClientApp;

    public function index():Collection;

    
}
