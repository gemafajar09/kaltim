<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('backend.template.home');
    }

    public function grafik()
    {
        return view('backend.grafik.index');
    }

    public function Biro()
    {
        return view('backend.biro.index');
    }

    public function reportpolres()
    {
        return view('backend.report.polres');
    }

    public function reportbiro()
    {
        return view('backend.report.biro');
    }
}
