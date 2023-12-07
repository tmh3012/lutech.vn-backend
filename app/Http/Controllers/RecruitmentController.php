<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecruitmentRequest;
use App\Http\Resources\RecruitmentResource;
use Illuminate\Http\JsonResponse;
use App\Models\Recruitments;

class RecruitmentController extends Controller
{
    public function index(): JsonResponse {
        return response()->json(RecruitmentResource::collection(Recruitments::all()));
    }

    public function show(Recruitments $recruitment): JsonResponse {
        return response()->json(new RecruitmentResource($recruitment));
    }

    public function store(StoreRecruitmentRequest $request): JsonResponse {
        Recruitments::create($request->validated());
        return response()->json("Recruitment Created");
    }

    public function update(StoreRecruitmentRequest $request, Recruitments $recruitment): JsonResponse {
        $recruitment->update($request->validated());
        return response()->json("Recruitment Updated");
    }

    public function destroy(Recruitments $recruitment): JsonResponse {
        $recruitment->delete();
        return response()->json("Recruitment deleted");
    }
}
