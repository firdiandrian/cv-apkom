<?php 
namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // public function showLoginForm()
    // {
    //     return view('contacts.login');
    // }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $contactss = Contacts::where('Email', $request->email)->first();

    //     if ($contactss && $request->password === $contactss->Password) {
    //         return $this->index();
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    public function index()
    {
        $contacts = Contacts::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaPengirim' => 'required',
            'EmailPengirim' => 'required|email',
            'NoTelpPengirim' => 'required',
            'Massage' => 'required'
        ]);

        Contacts::create($request->all());

        return redirect()->route('contacts.index')
                        ->with('success','Admin created successfully.');
    }

    public function show($ID)
    {
        $contacts = Contacts::find($ID);
        return view('contacts.show', compact('contacts'));
    }

    public function edit($ID)
    {
        $contacts = Contacts::find($ID);
        return view('contacts.edit', compact('contacts'));
    }

    public function update(Request $request, $ID)
    {
        $request->validate([
            'NamaPengirim' => 'required',
            'EmailPengirim' => 'required|email',
            'NoTelpPengirim' => 'required',
            'Massage' => 'required'
        ]);

        $contacts = Contacts::find($ID);
        $contacts->update($request->all());

        return redirect()->route('contacts.index')
                        ->with('success','Admin updated successfully');
    }

    public function destroy($ID)
    {
        $contacts = Contacts::find($ID);
        $contacts->delete();

        return redirect()->route('contacts.index')
                        ->with('success','Admin deleted successfully');
    }
}