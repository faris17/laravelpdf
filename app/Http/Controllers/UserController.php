<?php

namespace App\Http\Controllers;

use App\Exports\ProductStyleExport;
use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Models\TemporaryFile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        $data = User::all();

        return view('pages.user', ['data'=>$data]);
    }

    public function generatepdf(){
        $data = User::all();

        $pdf = PDF::loadView('pages.user', [ 'data' => $data]);

        return $pdf->download('latihanpdf.pdf');
    }

    //import
    public function import(){
        Excel::import(new UserImport, request()->file('file'));

        return back();
    }

    //export
    public function export(){
        return Excel::download(new UserExport, 'user.xlsx');
    }

    //get product
    public function getproduct($id){
        //make format date
        $date = Carbon::now();
        $formateDate = $date->format('d-m-Y');

        return Excel::download(new  ProductStyleExport($id), 'Laporan-'.$formateDate. '.xlsx');
    }

}
