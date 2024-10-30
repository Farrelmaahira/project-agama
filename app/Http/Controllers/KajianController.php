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
<<<<<<< HEAD
        //BUAT DAPETIN DATA YANG LAGI LOGIN BISA KYK DIBAWAH
        // $user = Auth::user();

        $data = Kajian::all();
        return view('admin.kajian.kajian', ["data"=>$data]);
=======
        try {
            $data = Kajian::all();
            dd($data);
            return view('admin.kajian.kajian', ["data" => $data]);
        } catch (\Throwable $e) {
            return view('admin.kajian.kajian')->with('error', $e);
        }
>>>>>>> d319bca2507e533875a82ab0afea40c2a965a180
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
            dd($res);
            return view('admin.kajian.kajian');

        } catch (\Throwable $e) {
            dd($e);
            return view('admin.kajian.add-kajian')->with('error', $e);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try {
            $data = Kajian::find($id);
            dd($data);
        } catch (\Throwable $e) {
            dd($e);
            return view();
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data = Kajian::find($id);
            dd($data);
        } catch (\Throwable $e) {
            dd($e);
            return view();
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
                return view('admin.kajian.kajian')->with('error', 'Record not found');
            }
            $data->update($payload);

            return view('admin.kajian.kajian');

        } catch (\Throwable $e) {
            dd($e);
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
            return view('admin.kajian.kajian')->with('error', 'Data not found');
           }

           $data->delete();
           if($data) {
            return view('admin.kajian.kajian');
           }

        } catch (\Throwable $e) {
            dd($e);
            return view('admin.kajian.kajian')->with('error', $e);
        }
    }
}
