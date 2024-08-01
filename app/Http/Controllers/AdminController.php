<?php 
namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admins.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admins::where('Email', $request->email)->first();

        if ($admin && $request->password === $admin->Password) {
            return $this->index();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function index()
    {
        $admins = Admins::all();
        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required',
            'Email' => 'required|email',
            'Password' => 'required'
        ]);

        Admins::create($request->all());

        return redirect()->route('admins.index')
                        ->with('success','Admin created successfully.');
    }

    public function show($id)
    {
        $admin = Admins::find($id);
        return view('admins.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admins::find($id);
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required',
            'Email' => 'required|email',
            'Password' => 'required'
        ]);

        $admin = Admins::find($id);
        $admin->update($request->all());

        return redirect()->route('admins.index')
                        ->with('success','Admin updated successfully');
    }

    public function destroy($id)
    {
        $admin = Admins::find($id);
        $admin->delete();

        return redirect()->route('admins.index')
                        ->with('success','Admin deleted successfully');
    }
}