<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class tampilController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::orderBy('created_at', 'desc')->get();
        $user = User::where('id', '!=', Auth::user()->id)->get();
        $tags = Tag::all();
        return view('user.index', compact('pertanyaan', 'user', 'tags'));
    }

    public function view_kategori($id)
    {
        $pertanyaan = Pertanyaan::where('tag_id', '=', $id)->get(); //DB::table('pertanyaan')->where('tag_id', '=', $id)->get();
        $tag_name = Tag::where('id', '=', $id)->first()->tag_name;
        $user = User::where('id', '!=', Auth::user()->id)->get();
        //dd($user);
        $tags = Tag::all();
        return view('user.index', compact('pertanyaan', 'tag_name', 'user', 'tags'));
    }

    public function kategori($id)
    {
        $tag_id = DB::table('pertanyaan_tag')->where('tag_id', '=', $id)->select('pertanyaan_id')->get();
        $tag_name = Tag::where('id', '=', $id)->first()->tag_name;
        return view('user.showTags', compact('tag_name', 'tag_id', 'id'));
    }

    public function kategori_pertanyaan($id)
    {
        $tag_id = DB::table('pertanyaan_tag')->where('tag_id', '=', $id)->select('pertanyaan_id')->get();
        $tag_name = Tag::where('id', '=', $id)->first()->tag_name;
        $new_id  = $id;
        //dd($id);
        return view('user.showDataTags', compact('tag_name', 'tag_id', 'new_id'));
    }
}
