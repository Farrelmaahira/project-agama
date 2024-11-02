<?php

namespace App\Http\Controllers;

use App\Models\Kajian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserKajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {
            // $data = Kajian::all();

            $query = Kajian::query();

            if($request->has('search')) {
                $query->where('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            }

            $data = $query->paginate(6);
            return view('user.kajian.kajian', ['data' => $data]);

        } catch (\Throwable $th) {
            return redirect()->intended('/kajian')->with('error', $th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Kajian::find($id);
            return view('user.kajian.detail-kajian', compact('data'));
        } catch (\Throwable $e) {
            return redirect()->route('kajian')->with('error', $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
