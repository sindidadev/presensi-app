<?php namespace Sindida\Pegawai\Components;

use Cms\Classes\ComponentBase;
use Sindida\Pegawai\Models\Pegawai;
use Illuminate\Support\Facades\Hash;
use Session;
use Winter\Storm\Exception\ApplicationException;
use Redirect;

class LoginPegawai extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Login Pegawai',
            'description' => 'Form login untuk pegawai'
        ];
    }

   public function onLogin()
{
    $email = post('email');
    $password = post('password');

    $pegawai = \Sindida\Pegawai\Models\Pegawai::where('email', $email)->first();

    if (!$pegawai) {

        throw new ApplicationException('Kombinasi Email dan Password salah.');
    }

    if (!Hash::check($password, $pegawai->password)) {
        throw new ApplicationException('Kombinasi Email dan Password salah.');
    }

    \Session::put('pegawai_logged_in', true);
    \Session::put('pegawai_id', $pegawai->id);

    return Redirect::to('/presensi');
}

    public function onLogout()
    {
        Session::forget('pegawai');
        return redirect('/login');
    }
}