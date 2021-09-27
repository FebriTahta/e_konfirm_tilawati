<?php

namespace App\Http\Controllers;
use App\Models\Pelatihan;
use App\Models\Peserta;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class DiklatCont extends Controller
{
    public function index()
    {
        return view('diklat.index');
    }

    public function data_diklat(Request $request)
    {
        if(request()->ajax())
        {
            $data   = Pelatihan::with('cabang')->with('peserta')->with('program')->orderBy('tanggal','desc')->where('jenis','diklat');
            return DataTables::of($data)
            ->make(true);
            // if(!empty($request->dari))
            // {
            //     $data   = Pelatihan::with('cabang')->with('peserta')->with('program')->orderBy('tanggal','desc')->where('jenis','diklat')
            //     ->whereBetween('tanggal', array($request->dari, $request->sampai));
            //     return DataTables::of($data)
            //             ->addColumn('peserta', function($data){
            //                 $data2 = Peserta::where('pelatihan_id', $data->id)->where('status',1)->count();
            //                 return $data2;
            //             })
            //             ->addColumn('cabang', function ($data) {
            //                 return $data->cabang->name;
            //             })
            //             ->addColumn('program', function ($data) {
            //                 return $data->program->name;
            //             })
            //             ->addColumn('tanggal', function($data){
            //                 if ($data->sampai_tanggal !== null) {
            //                     # code...
            //                     return Carbon::parse($data->tanggal)->isoFormat('dddd, D MMMM Y').' - '.
            //                     Carbon::parse($data->sampai_tanggal)->isoFormat('dddd, D MMMM Y');
            //                 }else{
            //                     return Carbon::parse($data->tanggal)->isoFormat('dddd, D MMMM Y');
            //                 }
            //             })
            //     ->rawColumns(['cabang','program','peserta','tanggal'])
            //     ->make(true);
            // }else{
            //     $data   = Pelatihan::with('cabang')->with('program')->with('peserta')->orderBy('tanggal','desc')->where('jenis','diklat');
            //     return DataTables::of($data)
            //             ->addColumn('peserta', function($data){
            //                 $data2 = Peserta::where('pelatihan_id', $data->id)->where('status',1)->count();
            //                 return $data2;
            //             })
            //             ->addColumn('cabang', function ($data) {
            //                 return $data->cabang->name;
            //             })
            //             ->addColumn('program', function ($data) {
            //                 return $data->program->name;
            //             })
            //             ->addColumn('tanggal', function($data){
            //                 if ($data->sampai_tanggal !== null) {
            //                     # code...
            //                     return Carbon::parse($data->tanggal)->isoFormat('dddd, D MMMM Y').' - '.
            //                     Carbon::parse($data->sampai_tanggal)->isoFormat('dddd, D MMMM Y');
            //                 }else{
            //                     return Carbon::parse($data->tanggal)->isoFormat('dddd, D MMMM Y');
            //                 }
            //             })
            //     ->rawColumns(['cabang','program','peserta','tanggal'])
            //     ->make(true);
            // }
        }
    }
}
