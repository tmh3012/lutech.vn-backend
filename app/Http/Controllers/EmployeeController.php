<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class EmployeeController extends Controller
{
    private object $model;
    public function __construct()
    {
        $this->model = User::query();
    }


    public function index (Request $request): JsonResponse
    {
        $query = $this->model
            ->latest()
            ->paginate()
            ->appends($request->all());

        $arr['data'] = $query->getCollection();
        $arr['pagination'] = $query->linkCollection();

        return response()->json($arr);
    }

    public function store (StoreEmployeeRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $position = $request->get('position');
            if(!empty($position)) {
                $validated['position_id'] = Position::firstOrCreate(['value' => $position])->id;
            }
            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);
            DB::commit();
            return response()->json($user);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json($e->getMessage());
        }
    }
}
