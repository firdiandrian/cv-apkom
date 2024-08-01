<?php
namespace App\Http\Controllers;

use App\Models\Barangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barangs::get(); 
        
        // Prepare the response data
        $responseData = [
            'barangs' => $barangs, 
        ];

        return view('barangs.index', $responseData);
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'NamaBarang' => 'required',
            'Harga' => 'required|numeric',
            'Stok' => 'required|numeric',
            'Foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload (optional)
        if ($request->hasFile('Foto')) {  
            $file = $request->file('Foto');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
        } else {
            $fileName = null;  // Set filename to null if no image uploaded
        }

        // Create a new Barang instance with filename (if uploaded)
        $barang = Barangs::create([
            'NamaBarang' => $request->NamaBarang,
            'Harga' => $request->Harga,
            'Stok' => $request->Stok,
            'Foto' => $fileName,  // Save only the filename in the database
        ]);

        $responseData = [
            'status' => true,
            'data' => [
                'ID' => $barang->ID,
                'NamaBarang' => $barang->NamaBarang,
                'Harga' => $barang->Harga,
                'Stok' => $barang->Stok,
                'Foto' => $barang->Foto,  // Return only the filename
            ],
            'message' => 'Barang has been created',
        ];

        // Return the JSON response
        return response()->json($responseData);

        
    }

    public function show(Barangs $barang)
    {
        return view('barangs.show', compact('barang'));
    }

    public function edit(Barangs $barang)
    {
        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'NamaBarang' => 'required',
            'Harga' => 'required|numeric',
            'Stok' => 'required|numeric',
            'Foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $barang = Barangs::findOrFail($id);

        if ($request->hasFile('Foto')) {
            $file = $request->file('Foto');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $barang->Foto = $fileName;
        }

        $barang->NamaBarang = $request->input('NamaBarang');
        $barang->Harga = $request->input('Harga');
        $barang->Stok = $request->input('Stok');
        $barang->save();

        return redirect()->route('barangs.index')
        ->with('success','Admin updated successfully');
    }


    
    public function destroy($ID)
    {
        $barang = Barangs::findOrFail($ID);
        $barang->delete();

        return redirect()->route('barangs.index')
                        ->with('success','Admin deleted successfully');
    }

    public function getbarang($ID)
    {
        $barang = Barangs::findOrFail($ID);

        $responseData = [
            'status' => true,
            'data' => [
                'ID' => $barang->ID,
                'NamaBarang' => $barang->NamaBarang,
                'Harga' => $barang->Harga,
                'Stok' => $barang->Stok,
                'Foto' => $barang->Foto,
            ],
            'message' => 'Barang details retrieved successfully',
        ];

        return response()->json($responseData);
    }
}