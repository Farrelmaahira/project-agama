<?php

namespace App\Http\Controllers;

use App\Models\Sunnah;
use Illuminate\Http\Request;

class UserSunnahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {

            $query = Sunnah::query();

            if($request->has('search')) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            }

            $data = $query->paginate(6);

            return view('user.sunnah.sunnah', compact('data'));
        } catch (\Throwable $th) {
            return view('user.sunnah.sunnah')->with('error', $th);
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
            $data = Sunnah::find($id);

            if($data == null) {
                return redirect()->intended(route('sunnah'));
            }

            return view('user.sunnah.detail-sunnah', ['data'=>$data]);
        } catch(\Throwable $e) {
            dd($e);
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
