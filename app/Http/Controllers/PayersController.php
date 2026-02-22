<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payer;
use Tymon\JWTAuth\Facades\JWTAuth;

class PayersController extends Controller
{
    public function index()
    {
        $payers = JWTAuth::user()->payers()->get();

        return response()->json($payers);
    }

    private function findUserPayer($id)
    {
        return JWTAuth::user()
            ->payers()
            ->where('id', $id)
            ->firstOrFail();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'document' => 'nullable|string|max:20',
        ]);

        $payer = JWTAuth::user()->payers()->create($data);

        return response()->json($payer, 201);
    }


    public function show(string $id)
    {
        return response()->json(
            $this->findUserPayer($id)
        );
    }


    public function update(Request $request, string $id)
    {
        $payer = $this->findUserPayer($id);

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email',
            'document' => 'sometimes|string|max:20',
        ]);

        $payer->update($data);

        return response()->json($payer);
    }


    public function destroy(string $id)
    {
        $payer = $this->findUserPayer($id);

        $payer->delete();

        return response()->json([
            'message' => 'Payer removido com sucesso'
        ]);
    }
}
