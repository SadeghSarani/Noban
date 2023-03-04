<?php

namespace App\Http\Controllers;

use App\Handler\ValidateUserForGetTurn\ValidateProcess;
use App\Http\Resources\TurnResource;
use App\Models\Turn;
use App\Repository\TurnRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TurnController extends Controller
{
    private TurnRepository $turnRepository;

    public function __construct()
    {
        $this->turnRepository = app('turnRepository');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|int',
            'doctor_id' => 'required|int',
        ]);

        $validate = ValidateProcess::check($request->all());

        if ($validate instanceof JsonResponse){
            return  $validate;
        }
        $turn = $this->turnRepository->create($request->all());

        return response()->json([
            'user_id' => $turn->user_id,
            'doctor_id' => $turn->doctor_id,
            'turn_id' => $turn->id
        ], Response::HTTP_CREATED);
    }
}
