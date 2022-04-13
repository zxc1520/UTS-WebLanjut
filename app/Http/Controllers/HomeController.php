<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Pengajar;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('home', [
            'title' => 'Home',
            'data' => Portfolio::all(),
            'dataPengajar' => Pengajar::all()
        ]);
    }

    public function show($id)
    {
        # code...
        $data = Home::where('id', 1);

        return view('dashboard.banner', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        # code...
        $rules = [
            'title' => 'required|min:5|max:255',
            'welcome' => 'required|min:5|max:255'
        ];

        $validate = $request->validate($rules);

        Home::where('id', $id)->update($validate);

        return redirect('/dashboard')->with('success', 'Data Edited Successfully !');
    }
}
