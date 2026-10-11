<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with(['member', 'membershipPackage'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Data membership berhasil diambil',
            'data' => $memberships
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'membership_package_id' => 'required|exists:membership_packages,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $membership = Membership::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran membership berhasil',
            'data' => $membership
        ], 201);
    }

    public function show($id)
    {
        $membership = Membership::with(['member', 'membershipPackage'])->find($id);

        if (!$membership) {
            return response()->json([
                'success' => false,
                'message' => 'Data membership tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail membership berhasil diambil',
            'data' => $membership
        ]);
    }

    public function update(Request $request, $id)
    {
        $membership = Membership::find($id);

        if (!$membership) {
            return response()->json([
                'success' => false,
                'message' => 'Data membership tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'member_id' => 'required|exists:members,id',
            'membership_package_id' => 'required|exists:membership_packages,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $membership->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data membership berhasil diperbarui',
            'data' => $membership
        ]);
    }

    public function destroy($id)
    {
        $membership = Membership::find($id);

        if (!$membership) {
            return response()->json([
                'success' => false,
                'message' => 'Data membership tidak ditemukan'
            ], 404);
        }

        $membership->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data membership berhasil dihapus'
        ]);
    }
}
