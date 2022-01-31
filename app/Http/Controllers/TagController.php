<?php

namespace App\Http\Controllers;

use App\Helper\ImgToBase64;
use App\Models\Profile;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use DB;

//Sweet alert
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($id)
    {
        $tag_id = DB::table('pertanyaan')->where('tag_id', '=', $id)->select('id')->get();
        $tag_name = Tag::where('id', '=', $id)->first()->tag_name;
        return view('user.showTags', compact('tag_name', 'tag_id', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $profile_id = Profile::select()
            ->where('id', $request->profile)
            ->get();
        $profile = 0;
        foreach ($profile_id as $prof) {
            $profile += $prof->user_id;
        }

        $jawaban = new Jawaban;
        $jawaban->isi = ImgToBase64::convert($request->jawaban);
        $jawaban->pertanyaan_id = $request->pertanyaan;
        $jawaban->user_id = $profile;
        $jawaban->save();

        Alert::success('Berhasil', 'Jawaban Berhasil di tambahkan');
        return redirect('jawaban')->with('sukses', 'data anda berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Jawaban $jawaban
     * @return \Illuminate\Http\Response
     */
    public function show(Jawaban $jawaban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Jawaban $jawaban
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.kategori.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jawaban $jawaban
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'isi' => 'required'
        ]);
        Tag::where('id', $id)
            ->update(['tag_name' => ($request->isi)]);
        Alert::success('Berhasil', 'kategori Berhasil di update');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Jawaban $jawaban
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Tag $tag, $id)
    {
        Tag::where('id', $id)->delete();
        Alert::success('Berhasil', 'Kategori Berhasil di hapus');
        return redirect('/');
    }
}
