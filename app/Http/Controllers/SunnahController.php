<?php

namespace App\Http\Controllers;

use App\Models\Sunnah;
use Illuminate\Http\Request;
use Throwable;

class SunnahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Sunnah::query();

            if($request->has('search')) {
               $query->where('judul', 'like', '%' . $request->search . '%' )->orWhere('description', 'like', '%' . $request->search . '%');
            }

            $data = $query->paginate(10);

            return view('admin.sunnah.sunnah', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->intended('/sunnah')->with('error', $th);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sunnah.add-sunnah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => ['required'],
                'description' => ['required'],
                'foto' => ['file', 'mimes:jpg,png,gif,jpeg']
            ]);

            $payload = [
                'judul' => $request->judul,
                'description' => $request->description,
            ];

            if($request->has('foto') != null) {
                $path = $request->file('foto')->store('uploads/sunnah');
                $payload['foto'] = $path;
            }

            $data = Sunnah::create($payload);
            if($data) {
                return redirect()->intended('/admin/sunnah');
            }

        } catch (\Throwable $th) {

        }

    }

    public function show(string $id)
    {
        try {
            $data = Sunnah::find($id);

            if($data == null) {
                return redirect()->intended('/admin/sunnah');
            }
        } catch(\Throwable $e) {
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = Sunnah::find($id);

            if($data == null) {
                return redirect()->intended('/admin/sunnah');
            }

            return view('admin.sunnah.edit-sunnah', compact('data'));
        } catch(\Throwable $e) {
            return redirect()->route('admin.sunnah')->with('error', $e);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'judul' => ['required'],
                'description' => ['required'],
                'foto' => ['file', 'mimes:jpg,png,gif,jpeg']
            ]);

            $payload = [
                'judul' => $request->judul,
                'description' => $request->description,
            ];

            if($request->has('foto') != null) {
                $path = $request->file('foto')->store('uploads/sunnah');
                $payload['foto'] = $path;
            }

            $sunnah = Sunnah::find($id);

            if($sunnah == null) {
                return redirect()->intended('/admin/sunnah')->with('error', 'Data not found');
            }

            $sunnah->update($payload);

            return redirect()->route('admin.sunnah');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Sunnah::find($id);
            if($data == null) {
                return redirect()->intended('/admin/sunnah')->with('error', 'Data not found');
            }


            $data->delete();
            if($data) {
                return redirect()->intended('/admin/sunnah');
            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
