<?php
namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Pembayarans;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        
        $pembayarans = Pembayarans::with('orders')->get();

        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        $orders = Orders::all();

        return view('pembayarans.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:orders,id',
            'Bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Konfirmasi' => 'required' ,
        ]);

        
        if ($request->hasFile('Bukti')) {  
            $file = $request->file('Bukti');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
        } else {
            $fileName = null;  // Set filename to null if no image uploaded
        }


        Pembayarans::create([
            'pemesanan_id' => $request->pemesanan_id,
            'Bukti' => $fileName,
            'Konfirmasi' => $request->Konfirmasi,
        ]);



        return redirect()->route('pembayarans.index')
        ->with('success', 'Order has been created');
    }

    public function show(Pembayarans $pembayarans)
    {
        return view('pembayarans.show', compact('pembayarans'));
    }

    public function edit($id)
    {
        $pembayarans = Pembayarans::with('orders.barangs')->findOrFail($id);
        return view('pembayarans.edit', compact('pembayarans'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'pemesanan_id' => 'required|exists:orders,id',
        'Bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'Konfirmasi' => 'required',
    ]);

    try {
        $pembayarans = Pembayaran::findOrFail($id);
        $pembayarans->pemesanan_id = $request->pemesanan_id;
        $pembayarans->Konfirmasi = $request->Konfirmasi;

        // Handle file upload if a new file is uploaded
        if ($request->hasFile('Bukti')) {
            // Delete old image if it exists
            if ($pembayarans->Bukti && file_exists(public_path('images/' . $pembayarans->Bukti))) {
                unlink(public_path('images/' . $pembayarans->Bukti));
            }

            $file = $request->file('Bukti');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Ensure unique filename
            $file->move(public_path('images'), $fileName);
            $pembayarans->Bukti = $fileName;
        }

        $pembayarans->save();

        return redirect()->route('pembayarans.index')->with('success', 'Pembayaran updated successfully');
    } catch (\Exception $e) {
        // Log the error message for debugging
        \Log::error('Error updating Pembayaran: '.$e->getMessage());

        // Redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while updating Pembayaran. Please try again.');
    }
}


public function destroy(Pembayarans $pembayarans)
{
    // Delete the associated image if it exists
    if ($pembayarans->Bukti && file_exists(public_path('images/' . $pembayarans->Bukti))) {
        unlink(public_path('images/' . $pembayarans->Bukti));
    }

    $pembayarans->delete();

    return redirect()->route('pembayarans.index')->with('success', 'Pembayaran has been deleted');
}



}
