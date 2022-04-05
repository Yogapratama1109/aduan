<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AduanController extends Controller
{
    public function index()
    {
        return view('aduan');
    }

    public function create(Request $request)
    {


        $file = $request->file('image');
        $thumbname = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path() . '/thumbAduan' . '/', $thumbname);

        DB::table('aduan')->insert([
            'id' => $request->id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'isi' => $request->isi,
            'image' => $thumbname,
        ]);

        return redirect()->back()->with('message', 'sukses nambah aduan');
    }

    public function edit(Request $request, $id)
    {
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/thumbAduan' . '/', $thumbname);

            $update = DB::table('aduan')->where('id', $id)->update([

                'nik' => $request->nik,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'isi' => $request->isi,
                'image' => $thumbname,
                'status' => $request->status,
            ]);
        } else {
            $update = DB::table('aduan')->where('id', $id)->update([

                'nik' => $request->nik,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'isi' => $request->isi,
                'status' => $request->status,
            ]);
        }

        return redirect()->back()->with('message', 'sukses edit aduan');
    }

    public function delete($id)
    {
        DB::table('aduan')->where('id', $id)->delete();

        return redirect()->back()->with('message', 'sukses delete aduan');
    }

    public function acceptAduan($id)
    {
        DB::table('aduan')->where('id',$id)->update([
            'status'=>2,
            'petugas_id'=>Auth::id()
        ]);
        return redirect()->back()->with(['status'=>'success','message'=>'berhasil accept']);
    }
    public function declineAduan($id)
    {
        DB::table('aduan')->where('id',$id)->update([
            'status'=>3,
            'petugas_id'=>Auth::id()
        ]);
        return redirect()->back()->with(['status'=>'success','message'=>'berhasil accept']);
    }
}
