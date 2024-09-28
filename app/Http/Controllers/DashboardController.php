<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Note;
use App\Models\Karyawan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Mpdf\Mpdf;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        $note = Note::where('user_id', auth()->user()->id)->get();
        return view('dashboard.index', ['karyawan' => $karyawan, 'note' => $note]);
    }

    public function gaji()
    {
        $karyawan = Karyawan::all();
        $karyawanT = Karyawan::orderByRaw("CASE WHEN status = 'Belum Digaji' THEN 0 ELSE 1 END")->paginate(6);
        return view('dashboard.gaji', ['karyawanT' => $karyawanT, 'karyawan' => $karyawan]);
    }

    public function gajiKaryawan($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->status = 'Sudah Digaji';
        date_default_timezone_set('Asia/Jakarta');
        $karyawan->tanggal_digaji = date('Y-m-d');
        $karyawan->save();
        return redirect()->route('dashboard.gaji')->with('success', 'Gaji karyawan berhasil dibayarkan');
    }

    public function gajiSemua(Request $request)
    {
        $karyawan = Karyawan::all();
        foreach($karyawan as $k){
            if($k->status == 'Sudah Digaji'){
                continue;
            }
            $k->status = 'Sudah Digaji';
            date_default_timezone_set('Asia/Jakarta');
            $k->tanggal_digaji = date('Y-m-d');
            $k->save();
        }
        return redirect()->route('dashboard.gaji')->with('success', 'Semua karyawan berhasil digaji');
    }

    public function karyawan(Request $request)
    {
        if($request->keyword){
            $karyawan = Karyawan::search($request->keyword)->get();
        } else {
            $karyawan = Karyawan::paginate(6);
        }
        return view('dashboard.karyawan', ['karyawan' => $karyawan]);
    }

    public function add()
    {
        return view('dashboard.karyawan.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:karyawans,nama',
            'gaji' => 'numeric|min:1000|required'
        ]);
        $karyawan = new Karyawan();
        $karyawan->nama = $request->nama;
        $karyawan->gaji = $request->gaji;
        $karyawan->save();
        return redirect()->route('dashboard.karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function delete($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();
        return redirect()->route('dashboard.karyawan')->with('success', 'Data karyawan berhasil dihapus');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('dashboard.edit', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:karyawans,nama,'.$id,
            'gaji' => 'numeric|min:1000|required',
            'status' => 'required|in:Belum Digaji,Sudah Digaji'
        ]);
        $karyawan = Karyawan::find($id);
        $karyawan->nama = $request->nama;
        $karyawan->gaji = $request->gaji;
        if($request->status == 'Sudah Digaji'){
            date_default_timezone_set('Asia/Jakarta');
            $karyawan->tanggal_digaji = date('Y-m-d');
            $karyawan->status = $request->status;
        } else {
            $karyawan->tanggal_digaji = null;
            $karyawan->status = $request->status;
        }
        $karyawan->save();
        return redirect()->route('dashboard.karyawan')->with('success', 'Data karyawan berhasil diubah');
    }

    public function notes()
    {
        return view('dashboard.notes.tambahnote');
    }

    public function createNotes(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->slug = Str::slug($request->title);
        $note->user_id = auth()->user()->id;
        $note->save();
        return redirect()->route('dashboard.notes')->with('success', 'Note berhasil ditambahkan');
    }

    public function viewNotes($id)
    {
        if(auth()->user()->id != Note::find($id)->user_id){
            return redirect()->route('dashboard.notes')->with('error', 'Anda tidak memiliki akses');
        }
        $note = Note::find($id);
        return view('dashboard.notes.viewnote', ['note' => $note]);
    }

    public function deleteNotes($id)
    {
        if(auth()->user()->id != Note::find($id)->user_id){
            return redirect()->route('dashboard.notes')->with('error', 'Anda tidak memiliki akses');
        }
        $note = Note::find($id);
        $note->delete();
        return redirect()->route('dashboard.notes')->with('success', 'Note berhasil dihapus');
    }

    public function laporan()
    {
        $karyawan = Karyawan::all();
        $karyawanT = Karyawan::orderByRaw("CASE WHEN status = 'Belum Digaji' THEN 0 ELSE 1 END")->paginate(6);
        $mpdf = new PDF();
        $mpdf = PDF::loadView('dashboard.laporan', ['karyawan' => $karyawan, 'karyawanT' => $karyawanT]);

        return $mpdf->stream();
    }
}
