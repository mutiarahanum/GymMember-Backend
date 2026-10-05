<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return response()->json([
            'success' => true,
            'message' => 'Data member berhasil diambil',
            'data' => $members 
        ]);
    }

    public function store(Request $request)
    {
        $member = Member::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Member berhasil ditambahkan',
            'data' => $member
        ], 201);
    }

    public function show(Member $member)
    {
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diambil',
            'data' => $member
        ]);
    }

    public function update(Request $request, Member $member)
    {
        $member->update($request->all());

        return response()->json([
            'success'=>true,
            'message'=> 'Member berhasil diubah',
            'data'=> $member
        ]);
    }

     public function destroy(Member $member)
    {
        $member->delete();

        return response()->json([
            'success' => true,
            'message' => 'Member berhasil dihapus'
        ]);
    }
}
