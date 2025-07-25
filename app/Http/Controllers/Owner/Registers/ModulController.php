<?php

namespace App\Http\Controllers\Owner\Registers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModulRegisterRequest;
use App\Services\Contracts\ModulServiceInterface;
use App\Registers\Modul;

class ModulController extends Controller
{
    protected $modulservice;

    public function __construct(ModulServiceInterface $modulService)
    {
        $this->modulservice = $modulService;
    }

    public function store(ModulRegisterRequest $request)
    {
        $this->modulservice->register($request->validated());
    }
}
