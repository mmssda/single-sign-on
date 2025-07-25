<?php

namespace App\Http\Controllers\Owner\Registers;

use Illuminate\Http\Request;
use App\Http\Requests\AppClientRegisterRequest;
use App\Http\Controllers\Controller;
use App\Services\Contracts\AppServiceInterface;
use Symfony\Component\HttpFoundation\Response;


class AppClientController extends Controller
{
    //
    protected $appService;

    public function __construct(AppServiceInterface $appService)
    {
        $this->appService = $appService;
    }

    public function store(AppClientRegisterRequest $request)
    {
        try
        {
        
            $client = $this->appService->register($request->validated());
              return response()->json([
                'message' => 'Aplikasi berhasil didaftarkan.',
                'data' => $client
            ], Response::HTTP_CREATED);
        }
        catch(\Throwable $e)
        {   
              return response()->json([
                'error' => 'Registrasi gagal.',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        try 
        {
            $data = $this->appService->show($id);
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], Response::HTTP_CREATED);

        }
        catch(\Throwable $e)
        {
            return response()->json([
                'error' => 'gagal',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 
    }

    public function index()
    {
        try
        {
            $data = $this->appService->index();

            return response()->json([
                'message' => 'index success',
                'data' => $data
            ], Response::HTTP_CREATED);
        }
        catch(\Throwable $e)
        {
            return response()->json([
                'error' => 'gagal',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
     
    }
}
