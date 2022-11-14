<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }
    public function create() {
        return view('admin.create');
    }

}
