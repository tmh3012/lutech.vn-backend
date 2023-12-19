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

    public function show($id): JsonResponse {
        return response()->json(Recruitments::find($id));
    }

    public function store(StoreRecruitmentRequest $request): JsonResponse {
        Recruitments::create($request->validated());
        return response()->json("Recruitment Created");
    }

    public function update(StoreRecruitmentRequest $request, $id): JsonResponse {
        Recruitments::find($id)->update($request->validated());
        return response()->json("Recruitment Updated");
    }

    public function destroy($id): JsonResponse {
        Recruitments::find($id)->delete();
        return response()->json("Recruitment deleted");
    }
}
