<?php

namespace App\Http\Controllers;
use App\Models\Pelatihan;
use App\Models\Peserta;
use App\Models\Program;
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
            $data = Pelatihan::where('jenis','diklat');
                    return DataTables::of($data)
                        ->addColumn('peserta', function($data){
                            return $data->peserta->count();
                        })
                        ->addColumn('cabang', function($data){
                            return $data->cabang->name;
                        })
                        ->addColumn('program', function($data){
                            return $data->program->name;
                        })
                        ->rawColumns(['cabang','program','peserta'])
                        ->make(true);
        }
    }
}
