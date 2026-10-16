<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\MembershipPackage;
use Carbon\Carbon;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::with([
            'member',
            'membershipPackage',
            'payments'
        ])->get();

        foreach ($memberships as $membership) {
            $membership->status_membership = $this->cekStatus($membership);
        }

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
        ]);

        $paket = MembershipPackage::findOrFail(
            $request->membership_package_id
        );

        $tanggalMulai = Carbon::parse($request->tanggal_mulai);

        $tanggalBerakhir = $tanggalMulai
            ->copy()
            ->addDays((int) $paket->durasi);

        $membership = Membership::create([
            'member_id' => $request->member_id,
            'membership_package_id' => $request->membership_package_id,
            'tanggal_mulai' => $tanggalMulai->toDateString(),
            'tanggal_berakhir' => $tanggalBerakhir->toDateString(),
        ]);

        $membership->load([
            'member',
            'membershipPackage',
            'payments'
        ]);

        $membership->status_membership = $this->cekStatus($membership);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran membership berhasil',
            'data' => $membership
        ], 201);
    }

    public function show($id)
    {
        $membership = Membership::with([
            'member',
            'membershipPackage',
            'payments'
        ])->find($id);

        if (!$membership) {
            return response()->json([
                'success' => false,
                'message' => 'Data membership tidak ditemukan'
            ], 404);
        }

        $membership->status_membership = $this->cekStatus($membership);

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
        ]);

        $paket = MembershipPackage::findOrFail(
            $request->membership_package_id
        );

        $tanggalMulai = Carbon::parse($request->tanggal_mulai);

        $tanggalBerakhir = $tanggalMulai
            ->copy()
            ->addDays((int) $paket->durasi);

        $membership->update([
            'member_id' => $request->member_id,
            'membership_package_id' => $request->membership_package_id,
            'tanggal_mulai' => $tanggalMulai->toDateString(),
            'tanggal_berakhir' => $tanggalBerakhir->toDateString(),
        ]);

        $membership->load([
            'member',
            'membershipPackage',
            'payments'
        ]);

        $membership->status_membership = $this->cekStatus($membership);

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

    private function cekStatus($membership)
    {
        $hariIni = Carbon::today();

        if ($hariIni->lt(Carbon::parse($membership->tanggal_mulai))) {
            return 'belum aktif';
        }

        if ($hariIni->gt(Carbon::parse($membership->tanggal_berakhir))) {
            return 'sudah berakhir';
        }

        return 'aktif';
    }
}
