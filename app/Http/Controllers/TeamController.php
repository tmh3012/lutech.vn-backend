<?php

namespace App\Http\Controllers;

use App\Http\Requests\Team\StoreTeamRequest;
use App\Models\Teams;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class TeamController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $teams = Teams::query()
            ->select([
                'id',
                'name',
                'description',
                'slug',
            ])
            ->get();
        return response()->json($teams);
    }

    public function store(StoreTeamRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $team = Teams::create($validated);
            DB::commit();
            return response()->json($team);
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 400);
        }
    }
}
