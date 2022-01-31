<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::orderBy('created_at', 'desc')->paginate(5);
        $user = User::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.profile.index', compact('profile', 'user'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // $profile = new Profile;

            $user = new User;
            $user->role = 'user';
            $user->username = $request->username; // mengambil dari requst name="nama
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(60);
            $user->save();

            $request->request->add(['user_id' => $user->id, 'nama' => $request->nama]);
            Profile::create($request->all());

        // $user = new User;
        // $user->role = 'user';
        // $user->username = $request->username; // mengambil dari requst name="nama
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->remember_token = Str::random(60);
        // $user->save();

        // avatar
        // untuk mengambil id dari user id

        // $request->request->add(['user_id' => $user->id]);
        // $profile = Profile::create($request->all());
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
        //     $profile->foto = $request->file('foto')->getClientOriginalName();
        //     $profile->save();
        // }
        Alert::success('Berhasil', 'Profile & user Berhasil di tambahkan');
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);


        if (isset($request->avatar) || $request->avatar != null) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            Profile::where('user_id', $id)
                ->update([
                    'nama' => $request->nama,
                    'bio' => $request->bio,
                    'alamat' => $request->alamat,
                    'avatar' => $request->file('avatar')->getClientOriginalName()
                ]);
        } else {
            Profile::where('user_id', $id)
                ->update(['nama' => $request->nama, 'bio' => $request->bio, 'alamat' => $request->alamat]);
        }

        if (!isset($request->password) || $request->password != null) {
            User::where('id', $id)
                ->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
        } else {
            $request->password = User::where('id',$id)->select('password')->first();
            User::where('id', $id)
                ->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => $request->password
                ]);
        }
        // if ($request->role === "") {
        //     $request->role = null;
        // }
        
        if (!isset($request->role) || $request->role != null) {
            User::where('id', $id)
                ->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'role' => $request->role
                ]);
        } else {
            $request->role = User::where('id',$id)->select('role')->first();
            User::where('id', $id)
                ->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'role' => $request->role
                ]);
        }

        Alert::success('Berhasil', 'Profile berhasil di update');
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Profile::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
        Alert::success('Berhasil', 'Profile berhasil di hapus');
        return redirect('profile')->with('eror', 'data anda berhasil di hapus');
    }

    public function ShowPertanyaan($id)
    {
        $user = User::find($id);
        $data = Pertanyaan::select()
            ->where('user_id', $id)
            ->get();
        return view('admin.profile.showData', compact('user', 'data'));
    }

    public function ShowJawaban($id)
    {
        $user = User::find($id);
        $jawaban = Jawaban::select()
            ->where('user_id', $id)
            ->get();
        //$tanya_id = Jawaban::where('user_id', $id)->select('pertanyaan_id')->get();
        //$penanya = Pertanyaan::find($tanya_id);
        //dd($penanya);

        return view('admin.profile.showData2', compact('user', 'jawaban'));
    }
}
