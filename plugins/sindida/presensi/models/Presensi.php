<?php namespace Sindida\Presensi\Models;

use Winter\Storm\Database\Model;

/**
 * Presensi Model
 */
class Presensi extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string
     */
    public $table = 'presensi'; 

    /**
     * @var array
     */
    protected $fillable = [
        'pegawai_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
    ];

    /**
     * @var array
     */
    public $rules = [
        'pegawai_id' => 'required',
        'tanggal' => 'required|date',
    ];

    /**
     * @var array
     */
    public $belongsTo = [
        'pegawai' => [\Sindida\Pegawai\Models\Pegawai::class],
    ];
}
