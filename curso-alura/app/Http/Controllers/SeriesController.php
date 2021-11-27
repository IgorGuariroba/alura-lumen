<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SeriesController
{
    public function index(): JsonResponse
    {
        return response()->json(Serie::all());
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json(
            Serie::create($request->all()),
            201
        );

    }

    public function show(int $id): JsonResponse
    {
        $serie = Serie::find($id);

        if (is_null($serie)) {
            return response()->json('', 204);
        }
        return response()->json($serie);

    }

    public function update(int $id, Request $request): JsonResponse
    {
        $serie = Serie::find($id);

        if (is_null($serie)) {
            return response()->json([
                "message" => 'Erro ao tentar atualizar a serie!',
                "success" => false
            ], 404);
        }


        $serie->fill($request->all());
        $serie->save();

        return response()->json($serie);

    }

    public function destroy(int $id)
    {
        $seriesRemovidas = Serie::destroy($id);

        if ($seriesRemovidas === 0) {
            return response()->json([
                "message" => 'Serie não encontrada!',
                "success" => false
            ], 404);
        }

        return response()->json('', 204);
    }

}
