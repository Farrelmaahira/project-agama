<?php

namespace App\Http\Controllers;

use App\Models\Kajian;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Kajian::all();
            return view('admin.kajian.kajian', ["data" => $data]);
        } catch (\Throwable $e) {
            return view('admin.kajian.kajian')->with('error', $e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kajian.add-kajian');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => ['required'],
                'tanggal' => ['required'],
                'jam' => ['required', 'date_format:H:i'],
                'description' => ['required'],
            ]);

            $time = Carbon::createFromFormat('H:i', $request->jam);

            $data = [
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'jam' => $time,
                'description' => $request->description
            ];

            if ($request->file('foto') != null) {
                $path = $request->file('foto')->store('uploads');
                $data['foto'] = $path;
            }

            $res = Kajian::create($data);
            return redirect()->route('admin.kajian');

        } catch (\Throwable $e) {
            return redirect()->route('admin.kajian.add')->with('error', $e);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try {
            $data = Kajian::find($id);
            return view('admin.kajian.detail-kajian', compact('data'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.kajian')->with('error', $e);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = Kajian::find($id);
           return view('admin.kajian.update-kajian', compact('data'));
        } catch (\Throwable $e) {
            return redirect()->intended(route('admin.kajian'));
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
                'tanggal' => ['required'],
                'jam' => ['required', 'date_format:H:i'],
                'description' => ['required'],
            ]);

            $time = Carbon::createFromFormat('H:i', $request->jam);

            $payload = [
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'jam' => $time,
                'description' => $request->description
            ];


            if($request->has('foto') != null) {
                $path = $request->file('foto')->store('uploads');
                $payload['foto'] = $path;
            }
            $data = Kajian::find($id);
            if($data == null) {
                return redirect()->route('admin.kajian')->with('error', 'Record not found');
            }
            $data->update($payload);

            return redirect()->intended(route('admin.kajian'));

        } catch (\Throwable $e) {
            dd($e);
            return redirect()->route('admin.kajian.update', ['id'=>$id])->with('error', $e);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Kajian::find($id);

            if($data == null) {
                return redirect()->route('admin.kajian')->with('error', 'Data not found');
            }
            $data->delete();
            if($data) {
                return redirect()->route('admin.kajian');
            }

        } catch (\Throwable $e) {
            dd($e);
            return redirect()->route('admin.kajian')->with('error', $e);
        }
    }
}
