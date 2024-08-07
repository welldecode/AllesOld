<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificateController extends Controller
{
    //

    public function list()
    {
        return view('admin.certificate.index');
    } 
    
    public function addorupdate()
    {
        return view('admin.certificate.form');
    }
}
