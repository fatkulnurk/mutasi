<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mutation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MutationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $request->validate([
            'bank_id' => 'nullable|string|exist:banks,id',
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
