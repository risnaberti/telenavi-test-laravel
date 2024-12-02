<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PendaftaranTryout
 * 
 * @property string $id_pendaftar
 * @property string|null $no_peserta
 * @property string $nama_lengkap
 * @property string $jenis_kelamin
 * @property string|null $nisn
 * @property Carbon|null $tanggal_lahir
 * @property string|null $tempat_lahir
 * @property string $nama_asal_sekolah
 * @property string|null $nama_ortu
 * @property string $no_wa_ortu
 * @property string $no_wa_peserta
 * @property string|null $alamat_domisili
 * @property Carbon|null $tanggal_pembayaran
 * @property float|null $nominal_tagihan
 * @property string|null $password_login
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PendaftaranTryout extends Model
{
	protected $table = 'pendaftaran_tryout';
	protected $primaryKey = 'id_pendaftar';
	public $incrementing = false;

	protected $casts = [
		'tanggal_lahir' => 'datetime',
		'tanggal_pembayaran' => 'datetime',
		'nominal_tagihan' => 'float'
	];

	protected $fillable = [
		'id_pendaftar',
		'no_peserta',
		'nama_lengkap',
		'jenis_kelamin',
		'nisn',
		'tanggal_lahir',
		'tempat_lahir',
		'nama_asal_sekolah',
		'nama_ortu',
		'no_wa_ortu',
		'no_wa_peserta',
		'alamat_domisili',
		'tanggal_pembayaran',
		'nominal_tagihan',
		'password_login'
	];
}
