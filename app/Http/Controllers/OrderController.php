<?php
namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Barangs;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        
        $orders = Orders::with('barangs')->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $barangs = Barangs::all();

        return view('orders.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,ID',
            'quantity' => 'required',
            'customer_name' => 'required',
            'customer_notelp' => 'required', // Changed to string
            'customer_alamat' => 'required',
        ]);

        $barangs = Barangs::findOrFail($request->barang_id);
        $total_price = $barangs->Harga * $request->quantity;

        Orders::create([
            'barang_id' => $request->barang_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'customer_name' => $request->customer_name,
            'customer_notelp' => $request->customer_notelp,
            'customer_alamat' => $request->customer_alamat,
        ]);

        return redirect()->route('orders.index')
        ->with('success', 'Order has been created');
    }

    public function show(Orders $orders)
    {
        return view('orders.show', compact('orders'));
    }

    public function edit(Orders $orders)
    {
        $barangs = Barangs::all();

        return view('orders.edit', compact('orders', 'barangs'));
    }

    public function update(Request $request, Orders $orders)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,ID',
            'quantity' => 'required|integer|min:1',
            'customer_name' => 'required|string|max:255',
            'customer_notelp' => 'required|string|max:20', // Changed to string
            'customer_alamat' => 'required|string|max:255',
        ]);

        $barangs = Barangs::findOrFail($request->barang_id);
        $total_price = $barangs->Harga * $request->quantity;

        $orders->update([
            'barang_id' => $request->barang_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
            'customer_name' => $request->customer_name,
            'customer_notelp' => $request->customer_notelp,
            'customer_alamat' => $request->customer_alamat,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order has been updated');
    }

    public function destroy(Orders $orders)
    {
        $orders->delete();

        return redirect()->route('orders.index')->with('success', 'Order has been deleted');
    }
}
