<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\User;
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


    public function index (Request $request) {
        $query = $this->model
            ->latest()
            ->paginate()
            ->appends($request->all());

        $arr['data'] = $query->getCollection();
        $arr['pagination'] = $query->linkCollection();

        return response()->json($arr);
    }

    public function store (StoreEmployeeRequest $request) {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $validated['password'] = Hash::make($validated['password']);

        } catch (\Throwable $e) {

        }


    }
}
