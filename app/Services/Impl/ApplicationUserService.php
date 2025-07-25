<?php

namespace App\Services\Impl;

use App\Services\Contracts\ApplicationUserInterface;
use App\Registers\ApplicationUser;

class ApplicationUserService implements ApplicationUserInterface
{
    public function register(array $credential):ApplicationUser
    {
        $id = ApplicationUser::max('id');
        return ApplicationUser::create([
            'id'            => $id != null ? $id++ : 1,
            'user_id'       => $credential['user_id'],
            'client_id'     => $credential['client_id'],
            'note'          => $credential['note'],
            'is_active'     => 1 
        ]);
    }

    public function show(int $id):ApplicationUser
    {
        $result = ApplicationUser::where('id', $id)->first();
        return $result;
    }
}