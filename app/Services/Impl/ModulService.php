<?php

namespace App\Services\Impl;
use App\Services\Contracts\ModulServiceInterface;
use App\Registers\Modul;
use Illuminate\Support\Collection;

class ModulService implements ModulServiceInterface
{
    public function register(array $credential):Modul
    {
     
        $idmax = Modul::max('id');
        return Modul::create([
            'id'                => $idmax != null ? $idmax++ : 1,
            'client_id'         => $credential['client_id'],
            'name'              => $credential['name'],
            'alias'             => $credential['alias'],
            'bacbackend_path'   => $credential['backend_path'],
            'frontend_path'     => $credential['frontend_path'],
            'icon'              => $credential['icon'],
            'sort'              => $credential['sort'],
            'is_visible'        => $credential['is_visible'],
        ]);
    }

    public function show(int $id):Modul
    {
        return Modul::where('id', $id)->with('app')->first();
    }

    public function index():Collection
    {
        return Modul::with('app')->get();
    }
}