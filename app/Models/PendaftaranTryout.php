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
 * @property string|null $nama_lengkap
 * @property string|null $jenis_kelamin
 * @property string|null $nisn
 * @property string|null $nama_asal_sekolah
 * @property string|null $nama_ortu
 * @property string|null $no_wa_ortu
 * @property string|null $no_wa_peserta
 * @property string|null $alamat_domisili
 * @property string|null $tanggal_pembayaran
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

	protected $fillable = [
		'no_peserta',
		'nama_lengkap',
		'jenis_kelamin',
		'nisn',
		'nama_asal_sekolah',
		'nama_ortu',
		'no_wa_ortu',
		'no_wa_peserta',
		'alamat_domisili',
		'tanggal_pembayaran'
	];
}
