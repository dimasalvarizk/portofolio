<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Ambil data terbaru dari database
        $contacts = Contact::latest()->get(); 
        
        // Kirim data ($contacts) ke tampilan (view)
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pesan berhasil dihapus');
    }
}