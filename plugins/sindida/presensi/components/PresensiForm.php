<?php namespace Sindida\Presensi\Components;

use Cms\Classes\ComponentBase;
use Session;
use Sindida\Pegawai\Models\Pegawai;

use Sindida\Presensi\Models\Presensi;

class PresensiForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Form Presensi',
            'description' => 'Form presensi untuk pegawai yang login'
        ];
    }

    public function onRun()
    {
        $pegawaiId = Session::get('pegawai_id');
        if (!$pegawaiId) return redirect('/login');

        $this->page['pegawai'] = Pegawai::find($pegawaiId);

        // Ambil presensi hari ini
        $this->page['presensi'] = Presensi::where('pegawai_id', $pegawaiId)
            ->where('tanggal', date('Y-m-d'))
            ->first();
    }

    public function onPresensi()
{
    $pegawaiId = Session::get('pegawai_id');
    if (!$pegawaiId) {
        return redirect('/login');
    }

    $presensi = Presensi::firstOrCreate(
        ['pegawai_id' => $pegawaiId, 'tanggal' => date('Y-m-d')],
        ['jam_masuk' => date('H:i:s')]
    );

    return redirect('/presensi')->with('success', 'Absen masuk tercatat');
}


   public function onPulang()
{
    $pegawaiId = Session::get('pegawai_id');
    if (!$pegawaiId) {
        return redirect('/login');
    }

    $presensi = Presensi::where('pegawai_id', $pegawaiId)
        ->where('tanggal', date('Y-m-d'))
        ->first();

    if ($presensi) {
        $presensi->jam_pulang = date('H:i:s');
        $presensi->save();
    }

    return redirect('/presensi')->with('success', 'Absen pulang tercatat');
}

    public function onLogout()
    {
        Session::forget('pegawai_id');
        return redirect('/login');
    }
}
