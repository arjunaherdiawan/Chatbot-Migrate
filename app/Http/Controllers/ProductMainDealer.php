<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\MainDealer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductMainDealer extends Controller
{
    public function index(): JsonResponse
    {
        $mainDealers = MainDealer::with(['Cabang', 'Service'])->paginate(10);
        
        return response()->json([
            'success' => true,
            'data' => $mainDealers
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id_main' => 'required|string|unique:main_dealer,id_main', 
            'nama_main' => 'required|string|max:255',
            'alamat' => 'required|string',
            'notelp' => 'required|string', 
            'email' => 'required|email|unique:main_dealer,email'
        ]);
    

        $mainDealer = MainDealer::create($validated);

        return response()->json([
        'success' => true,
        'message' => 'Main dealer created successfully',
        'data' => $mainDealer
        ], 201);
    }
    public function show($id): JsonResponse
    {
        $mainDealer = MainDealer::where('id_main', $id)->with(['Cabang', 'Service'])->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $mainDealer
        ]);
    }
    public function update(Request $request, $id): JsonResponse
    {
        $mainDealer = MainDealer::where('id_main', $id)->firstOrFail();
        
        $validated = $request->validate([
            'id_main' => 'sometimes|string|unique:main_dealer,id_main,' . $mainDealer->id_main . ',id_main',
            'nama_main' => 'sometimes|string|max:255',
            'alamat' => 'sometimes|string',
            'notelp' => 'sometimes|string',
            'email' => 'sometimes|email|unique:main_dealer,email,' . $mainDealer->id_main . ',id_main'
        ]);

        $mainDealer->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Main dealer updated successfully',
            'data' => $mainDealer
        ]);
    }
    public function destroy($id): JsonResponse
    {
        $mainDealer = MainDealer::where('id_main', $id)->firstOrFail();
        $mainDealer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Main dealer deleted successfully'
        ]);
    }
}





