<?php

namespace App\Http\Controllers\app;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function index()
    {
        return view('signatures.index');
    }
}
