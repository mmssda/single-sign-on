<?php

namespace App\Http\Controllers\Owner\Registers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

use App\Services\Contracts\ApplicationUserInterface;

class ApplicationUserController extends Controller
{
    protected $appuser;
    public function __construct(ApplicationUserInterface $appuser)
    {
        $this->appuser = $appuser;
    }

    public function store(Request $request)
    {
        try
        {
            $credential = $request->all();
            $data       = $this->appuser->register($credential);

            return response()->json([
                'message' => 'user berhasil didaftarkan.',
                'data' => $data
            ], Response::HTTP_CREATED);
        }
        catch(\Throwable $e)
        {
            return response()->json([
                'error' => 'user gagal di daftarkan',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
