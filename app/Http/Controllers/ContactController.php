<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function send_message(Request $request){
        $nama = $request->name;
        $email = $request->email;
        $subjek = $request->subject;
        $pesan = $request->message;

        $contact = new Contact;
        $contact->nama = $nama;
        $contact->email = $email;
        $contact->subjek = $subjek;
        $contact->pesan = $pesan;

        $contact->save();

        return redirect()->route('home')->with('success_message','Pesan Anda berhasil terkirim');
    }

    public function index(){
        $data = [
            'title'=>'Kontak Pesan',
            'messages'=>Contact::all()
        ];

        return view('backend.pages.contact.list',$data);
    }

    public function approve($id){
        $contact = Contact::find($id);
        $contact->status = 'success';
        $contact->save();

        return back()->with('success','Pesanan berhasil di approve.');
    }

    public function progress($id){
        $contact = Contact::find($id);
        $contact->status = 'progress';
        $contact->save();

        return back()->with('success','Pesanana masih dalam proses pengerjaan');
    }
}
