<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DirecionadorRequest;
use App\Services\DirecionadorService;
use Illuminate\Http\Request;

class DirecionadorController extends Controller
{
    protected $direcionadorService;

    public function __construct(DirecionadorService $direcionadorService){
        $this->direcionadorService = $direcionadorService;
    }

    public function index(DirecionadorRequest $request){
        return response()->json($this->direcionadorService->getAll());
    } 

    public function store(DirecionadorRequest $request){
        $direcionador = $this->direcionadorService->create($request->validated());
        return response()->json([$direcionador, 201]);
    }

    public function show($id){
        $direcionador = $this->direcionadorService->getById($id);
        if(!$direcionador){
            return response()->json(["message"=> "Direcionador não encontrado!"],404);
        }
        return response()->json($direcionador);
    }

    public function update(DirecionadorRequest $request, $id){
        $direcionador = $this->direcionadorService->update($id, $request->validated());
        if(!$direcionador){
            return response()->json(["message"=> "Direcionador não encontrado!"],404);
        }
        return response()->json($direcionador);
    }

    public function destroy($id){   
        $deleted = $this->direcionadorService->delete($id);
        if(!$deleted){
            return response()->json(["message"=> "Direcionador não encontrado!"],404);
        }
    return response()->json(["message"=> "Direcionador removido com sucesso!"],200);
    }
}