<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('dashboard.portfolio', ['title' => 'Portfolio']);
    }

    public function detail($id)
    {
        # code...
        $data = Portfolio::find($id);

        return view('details.portfolio', compact('data'));
    }

    public function store(Request $request)
    {
        # code...
        $validate = $request->validate([
            'title' => 'required|min:5|max:255',
            'type' => 'required',
            'author' => 'required|min:5',
            'desc' => 'required',
        ]);

        if ($validate) {
            # code...
            Portfolio::create($validate);
            return redirect('/dashboard')
                    ->with('success', 'Data Recorded Successfuly !');
        } else {
            return back()
                    ->with('error', 'Something Went Wrong !');
        }
    }

    public function show($id)
    {
        # code...
        $data = Portfolio::find($id);

        return view('dashboard.edit-portfolio', compact('data'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $rules = [
            'title' => 'required|min:5|max:255',
            'type' => 'required',
            'author' => 'required|min:5',
            'desc' => 'required',
        ];

        $validate = $request->validate($rules);

        Portfolio::where('id', $id)->update($validate);

        return redirect('dashboard')->with('success', 'Data Change Successfully');
    }

    public function delete($id)
    {
        # code...
        $data = Portfolio::find($id);
        $data->delete();

        return redirect('dashboard')->with('success', 'Data has been removed');
    }
}
