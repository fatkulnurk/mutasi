<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mutation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'bank_id' => 'nullable|string|exists:banks,id',
            'type' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date|date|after:from_date',
        ]);

        $mutations = Mutation::where('user_id', $request->user()->id)
            ->when(!blank($request->bank_id), function ($query) use ($request) {
                return $query->where('bank_id', $request->bank_id);
            })
            ->when(!blank($request->type), function ($query) use ($request) {
                return $query->where('type', $request->type);
            })
            ->when(!blank($request->from_date), function ($query) use ($request) {
                $timestamp = Carbon::parse($request->from_date)->timestamp;

                return $query->where('created_at', '>=', $timestamp);
            })
            ->when(!blank($request->to_date), function ($query) use ($request) {
                $timestamp = Carbon::parse($request->to_date)->timestamp;

                return $query->where('created_at', '<=', $timestamp);
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return response()->json($mutations);
    }
}
