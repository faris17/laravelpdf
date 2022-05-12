<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PDF;

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
}
