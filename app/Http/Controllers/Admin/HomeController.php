<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['title']          = "Beranda";
        return view('admin.home.list')->with($data);
    }

    public function profil()
    {
        $title                  = 'Detail User';
        $info                   = User::find(Auth::user()->id);
        return view('admin.home.profile', compact(['title','info']));
    }
}
