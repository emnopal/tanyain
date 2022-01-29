<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tampilController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::orderBy('created_at', 'desc')->get();
        $user = User::where('id', '!=', Auth::user()->id)->get();
        $tags = tag::all();
        //dd($tag);
        return view('user.index', compact('pertanyaan', 'user', 'tags'));
    }
    public function kategori(Request $id)
    {
        $pertanyaan = Pertanyaan::where('id', '===', 1)->get();
        $user = User::where('id', '!=', Auth::user()->id)->get();
        $tags = tag::all();
        dd($pertanyaan);
        //return view('user.index', compact('pertanyaan', 'user', 'tags'));
    }
}
