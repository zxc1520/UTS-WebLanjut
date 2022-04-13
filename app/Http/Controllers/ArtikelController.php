<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('artikel', [
            'title' => 'Artikel',
            'dataArtikel' => Artikel::all()
        ]);
    }

    public function detail($id)
    {
        # code...
        $data = Artikel::find($id);

        return view('details.artikel', compact('data'));
    }

    public function dashboard()
    {
        # code...
        return view('dashboard.artikel', ['title' => 'Artikel']);
    }

    public function store(Request $request)
    {
        # code...
        $validate = $request->validate([
            'title' => 'required|min:3|max:255',
            'desc' => 'required|min:3|max:255',
        ]);

        if($validate) {

            Artikel::create($validate);

            return redirect('/dashboard')
                ->with('success', 'Data Recorded Successfully !');
        } else {
            return back()
                ->with('error', 'Something Went Wrong !');
        }
    }

    public function show($id)
    {
        # code...
        $data = Artikel::find($id);

        return view('dashboard.edit-artikel', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        # code...
        $data = Artikel::find($id);
        $data->update($request->all());

        return redirect('/dashboard')->with('success', 'Data Edited Successfully');
    }

    public function delete($id)
    {
        # code...
        $data = Artikel::find($id);
        $data->delete();

        return redirect('/dashboard')->with('success', 'Data has been deleted');
    }
}
