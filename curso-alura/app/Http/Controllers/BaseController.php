<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController
{
    protected string $classe;

    public function index(): JsonResponse
    {
        return response()->json($this->classe::all());
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(
            $this->classe::create($request->all()),
            201
        );

    }

    public function show(int $id): JsonResponse
    {
        $serie = $this->classe::find($id);

        if (is_null($serie)) {
            return response()->json('', 204);
        }
        return response()->json($serie);

    }

    public function update(int $id, Request $request): JsonResponse
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()->json([
                "message" => "Erro ao tentar atualizar a $this->classe!",
                "success" => false
            ], 404);
        }


        $recurso->fill($request->all());
        $recurso->save();

        return response()->json($recurso);

    }

    public function destroy(int $id)
    {
        $seriesRemovidas = $this->classe::destroy($id);

        if ($seriesRemovidas === 0) {
            return response()->json([
                "message" => "$this->classe não encontrada!",
                "success" => false
            ], 404);
        }

        return response()->json('', 204);
    }

}
