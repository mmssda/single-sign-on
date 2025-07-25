<?php

namespace App\Services\Contracts;
use App\Registers\ClientApp;
use App\User;

interface AuthorizationInterface 
{
        /**
     * Validasi apakah user memiliki akses ke client app.
     */
    public function authorizeUserAccess(ClientApp $clientApp, User $user): bool;

    /**
     * Mendapatkan daftar client app yang dapat diakses oleh user.
     */
    public function getAuthorizedClientsForUser(User $user);

}