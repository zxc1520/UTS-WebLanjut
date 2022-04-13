<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('pengajar', [
            'title' => 'Pengajar',
            'data' => Pengajar::all()
        ]);
    }

    public function base()
    {
        # code...
        return view('dashboard.pengajar', [
            'title' => 'Pengajar',
        ]);
    }

    public function store(Request $req)
    {
        # code...
        $validateData = $req->validate([
            'nama' => 'required|min:5|max:255',
            'jabatan' => 'required|min:5|max:255',
            'alamat' => 'required',
            'kontak' => 'required|min:5',
        ]);


        if ($validateData) {
            Pengajar::create($validateData);
            return redirect('/dashboard')
                    ->with('success', 'Sukes');
        } else {
            return back()
                    ->with('error', 'something went wrong');
        }

    }

    public function show($id)
    {
        # code...
        $data = Pengajar::find($id);

        return view('dashboard.edit-pengajar', compact('data'));
    }

    public function edit(Request $req, $id)
    {
        $data = Pengajar::find($id);
        $data->update($req->all());

        return redirect('/dashboard')->with('success', 'Data Edited Successfully');
        # code...
    }

    public function delete($id)
    {
        # code...
        $data = Pengajar::find($id);
        $data->delete();

        return redirect('/dashboard')->with('success', 'Data has been deleted');
    }
}
