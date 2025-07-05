<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\User;
use App\Models\Approval;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userId = $user->id;
        $orders = Pemesanan::with(['kendaraan', 'driver', 'pemesan', 'approvals'])->get();

        $orders = $orders->map(function ($order) use ($userId) {
            $approvals = $order->approvals->whereIn('level', [1, 2]);

            $approvedCount = $approvals->where('status', 'disetujui')->count();
            $totalApprover = $approvals->count();

            $order->approval_progress = "{$approvedCount}/{$totalApprover}";

            if ($approvals->where('status', 'ditolak')->count() > 0) {
                $order->approval_status = 'Ditolak';
            } elseif ($approvedCount === $totalApprover && $totalApprover > 0) {
                $order->approval_status = 'Disetujui';
            } elseif ($approvedCount === 0) {
                $order->approval_status = 'Menunggu';
            } else {
                $order->approval_status = 'Dalam Proses';
            }

            // 👇 cek apakah user ini adalah approver yang belum menyetujui
            $userApproval = $approvals->firstWhere('approver_id', $userId);
            $order->can_approve = $userApproval && $userApproval->status === null;
            $order->user_approval_id = $userApproval?->id;

            return $order;
        });


        return Inertia::render('Order', [
            'orders' => $orders,
            'auth' => [
                'user' => $user,
            ],
        ]);
    }
    public function create()
    {
        // dd(Kendaraan::select('id', 'nomor_polisi', 'merk', 'tipe')->get());
        return Inertia::render('Order-form', [
            'kendaraans' => Kendaraan::all(),
            'drivers' => Driver::all(),
            'approvers1' => User::where('role', 'approver')->where('level_approval', 1)->get(),
            'approvers2' => User::where('role', 'approver')->where('level_approval', 2)->get(),
            'storeRoute' => route('order.store'),
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'driver_id' => 'required|exists:drivers,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi_awal' => 'required|string',
            'lokasi_tujuan' => 'required|string',
            'keperluan' => 'required|string',
            'approver1_id' => 'required|exists:users,id',
            'approver2_id' => 'required|exists:users,id',
        ]);

        $pemesanan = Pemesanan::create([
            'tanggal_pemesanan' => now(),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keperluan' => $request->keperluan,
            'kendaraan_id' => $request->kendaraan_id,
            'driver_id' => $request->driver_id,
            'pemesan_id' => auth()->id(),
            'lokasi_awal' => $request->lokasi_awal,
            'lokasi_tujuan' => $request->lokasi_tujuan,
            'status' => 'menunggu',
        ]);

        Approval::create([
            'pemesanan_id' => $pemesanan->id,
            'approver_id' => $request->approver1_id,
            'level' => 1,
        ]);

        Approval::create([
            'pemesanan_id' => $pemesanan->id,
            'approver_id' => $request->approver2_id,
            'level' => 2,
        ]);

        return redirect()->route('order.index')->with('success', 'Pemesanan berhasil diajukan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
