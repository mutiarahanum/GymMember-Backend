<?php

namespace App\Http\Controllers;

use App\Models\MembershipPackage;
use Illuminate\Http\Request;

class MembershipPackageController extends Controller
{
    public function index()
    {
        $packages = MembershipPackage::all();

        return response()->json([
            'success' => true,
            'message' => 'Data paket membership berhasil diambil',
            'data' => $packages
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string',
            'durasi' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $package = MembershipPackage::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Paket membership berhasil ditambahkan',
            'data' => $package
        ], 201);
    }

    public function show($id)
    {
        $package = MembershipPackage::find($id);

        if (!$package) {
            return response()->json([
                'success' => false,
                'message' => 'Paket membership tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail paket membership berhasil diambil',
            'data' => $package
        ]);
    }

    public function update(Request $request, $id)
    {
        $package = MembershipPackage::find($id);

        if (!$package) {
            return response()->json([
                'success' => false,
                'message' => 'Paket membership tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama_paket' => 'required|string',
            'durasi' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $package->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Paket membership berhasil diperbarui',
            'data' => $package
        ]);
    }

    public function destroy($id)
    {
        $package = MembershipPackage::find($id);

        if (!$package) {
            return response()->json([
                'success' => false,
                'message' => 'Paket membership tidak ditemukan'
            ], 404);
        }

        $package->delete();

        return response()->json([
            'success' => true,
            'message' => 'Paket membership berhasil dihapus'
        ]);
    }
}
