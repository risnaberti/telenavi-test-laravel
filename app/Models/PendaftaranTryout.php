<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
	public static $prefix = '25';

	protected $casts = [
		'tanggal_pembayaran' => 'datetime',
		'nominal_tagihan' => 'float',
		'created_at' => 'datetime'
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

	public function getNamaJenisKelaminAttribute()
	{
		$value = $this->jenis_kelamin;

		return $value == 'P' ? 'Perempuan' : ($value == 'L' ? 'Laki-laki' : 'Tidak Diketahui');
	}

	public static function generateIdPendaftar()
	{
		$prefix = self::$prefix;

		$urutan_baru = collect(DB::select("
            SELECT IFNULL(MAX(SUBSTR(id_pendaftar, 3)), CONCAT($prefix, '0000')) + 1 as urutan_baru
            FROM `pendaftaran_tryout`
            WHERE SUBSTR(id_pendaftar, 3, 2) = $prefix
        "))->value('urutan_baru');

		return '91' . $urutan_baru;
	}

	public static function generateNoPeserta()
	{
		$prefix = self::$prefix;

		$urutan_baru = collect(DB::select("
            SELECT IFNULL(MAX(SUBSTR(no_peserta, 8)), CONCAT($prefix, '0000')) + 1 as urutan_baru
            FROM pendaftaran_tryout
            WHERE SUBSTR(no_peserta, 8, 2) = $prefix
        "))->value('urutan_baru');

		return 'TO_Muga' . $urutan_baru;
	}

	public function siswa()
	{
		return $this->belongsTo(Siswa::class, 'id_pendaftar', 'nis');
	}
}
