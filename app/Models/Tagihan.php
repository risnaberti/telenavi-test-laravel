<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tagihan
 * 
 * @property string $idtagihan
 * @property int|null $idlogtagihan
 * @property string|null $kodebulan
 * @property int|null $kodeta
 * @property string|null $kodekelompok
 * @property Carbon|null $tglgenerate
 * @property string|null $nis
 * @property Carbon|null $waktuawal
 * @property Carbon|null $waktuakhir
 * @property int|null $aktif
 * @property int|null $urutanantrian
 * @property float|null $totaltagihan
 * @property string|null $tahun
 * @property int|null $statuspembayaran
 * @property string|null $jenispembayaran
 * @property Carbon|null $tglbayar
 * @property string|null $api_key
 * 
 * @property Bulan|null $bulan
 * @property Siswa|null $siswa
 * @property Tahunajaran|null $tahunajaran
 * @property Kelompokkela|null $kelompokkela
 * @property Collection|Detailtagihan[] $detailtagihans
 *
 * @package App\Models
 */
class Tagihan extends Model
{
	protected $table = 'tagihan';
	protected $primaryKey = 'idtagihan';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idlogtagihan' => 'int',
		'kodeta' => 'int',
		'tglgenerate' => 'datetime',
		'waktuawal' => 'datetime',
		'waktuakhir' => 'datetime',
		'aktif' => 'int',
		'urutanantrian' => 'int',
		'totaltagihan' => 'float',
		'statuspembayaran' => 'int',
		'tglbayar' => 'datetime'
	];

	protected $fillable = [
		'idtagihan',
		'idlogtagihan',
		'kodebulan',
		'kodeta',
		'kodekelompok',
		'tglgenerate',
		'nis',
		'waktuawal',
		'waktuakhir',
		'aktif',
		'urutanantrian',
		'totaltagihan',
		'tahun',
		'statuspembayaran',
		'jenispembayaran',
		'tglbayar',
		'api_key'
	];

	public function siswa()
	{
		return $this->belongsTo(Siswa::class, 'nis');
	}

	public function tahunajaran()
	{
		return $this->belongsTo(Tahunajaran::class, 'kodeta');
	}

	public function detailtagihans()
	{
		return $this->hasMany(Detailtagihan::class, 'idtagihan');
	}
}
