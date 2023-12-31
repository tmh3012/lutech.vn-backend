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
        $limit = $request->get('limit') ?? 10;
        $name = $request->get('name');
        $position = $request->get('position_value');


        $query = $this->model
            ->with('position:id,value')
            ->when(isset($name), function ($q) use ($name) {
                return $q->where('name', 'like', "%$name%");
            })
            ->when(isset($position), function ($q) use ($position) {
                return $q->whereHas('position', function ($query) use ($position) {
                    return $query->whereRaw("id in ($position)");
                });
            })
            ->latest()
            ->paginate($limit)
            ->appends($request->all());

        $arr['request'] = $request->all();
        $arr['employees'] = $query->getCollection();
        $arr['lastPage'] = $query->lastPage();

        return response()->json($arr);
    }

    public function getById(Request $request, $id): JsonResponse
    {
        $employees = $this->model
            ->with('position')
            ->find($id);
        return response()->json($employees);
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
