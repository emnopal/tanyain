<?php

namespace App\Http\Controllers;

use App\Helper\ImgToBase64;
use App\Models\User;
use App\Models\Profile;
use App\Models\tag;
use App\Models\Pertanyaan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Sweet alert
use RealRashid\SweetAlert\Facades\Alert;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::orderBy('created_at', 'desc')->paginate(5);
        $pertanyaan = Pertanyaan::orderBy('created_at', 'desc')->paginate(5);
        $user = User::all();
        return view('admin.pertanyaan.index', compact('pertanyaan', 'profile', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    // tambah
    public function store(Request $request)
    {
        $request->validate([
            'profile' => 'required',
            'judul' => 'required|min:8',
            'isi' => 'required'
        ]);

        $tags_arr = explode(',', $request["tags"]);

        $tags_id = [];
        foreach ($tags_arr as $tag_name) {
            $tag = tag::firstOrCreate(['tag_name' => $tag_name]);
            $tags_id[] = $tag->id;
        }


        $pertanyaan = new Pertanyaan;
        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = ImgToBase64::convert($request->isi);
        $pertanyaan->user_id = $request->profile;

        $pertanyaan->save();

        $pertanyaan->tags()->sync($tags_id);
        $user = User::find($request->profile);
        $user->pertanyaan()->save($pertanyaan);

        Alert::success('Berhasil', 'Pertanyaan Berhasil di tambahkan');
        return redirect('Pertanyaan')->with('sukses', 'data anda berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Pertanyaan $pertanyaan
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    // detail
    public function show($id)
    {
        $tanya = Pertanyaan::find($id);
        return view('admin.pertanyaan.show', compact('tanya'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Pertanyaan $pertanyaan
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    // edit
    public function edit($id)
    {
        $tanya = Pertanyaan::find($id);
        return view('admin.pertanyaan.edit', compact('tanya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pertanyaan $pertanyaan
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    // uodate
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|min:8',
            'isi' => 'required'
        ]);
        Pertanyaan::where('id', $id)
            ->update(['judul' => $request->judul, 'isi' => ImgToBase64::convert($request->isi)]);
        Alert::success('Berhasil', 'Pertanyaan Berhasil di Update');
        return redirect('Pertanyaan')->with('sukses', 'data anda berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Pertanyaan $pertanyaan
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    // hapus
    public function destroy(Pertanyaan $pertanyaan, $id)
    {
        Pertanyaan::where('id', $id)->delete();
        Alert::success('Berhasil', 'Pertanyaan Berhasil di hapus');
        return redirect('Pertanyaan')->with('eror', 'data anda berhasil di hapus');
    }
}
