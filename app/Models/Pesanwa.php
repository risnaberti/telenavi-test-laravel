<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pesanwa
 * 
 * @property int $pesan_id
 * @property string|null $isi_pesan
 * @property Carbon|null $tgl_kirim
 * @property string|null $status_pesan
 * @property string|null $no_pendaftaran
 * @property string|null $jenis_pesan
 * @property string|null $no_hp
 *
 * @package App\Models
 */
class Pesanwa extends Model
{
	protected $table = 'pesanwa';
	protected $primaryKey = 'pesan_id';
	public $timestamps = false;

	protected $casts = [
		'tgl_kirim' => 'datetime'
	];

	protected $fillable = [
		'isi_pesan',
		'tgl_kirim',
		'status_pesan',
		'no_pendaftaran',
		'jenis_pesan',
		'no_hp'
	];
}
