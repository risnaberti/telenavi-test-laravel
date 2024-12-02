<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Historykela
 * 
 * @property int $kodehistory
 * @property string|null $kodestatus
 * @property string|null $kodekelas
 * @property int|null $kodeta
 * @property string|null $nis
 * @property string|null $isaktif
 * 
 * @property Statusmurid|null $statusmurid
 * @property Tahunajaran|null $tahunajaran
 * @property Siswa|null $siswa
 * @property Kela|null $kela
 *
 * @package App\Models
 */
class Historykelas extends Model
{
	protected $table = 'historykelas';
	protected $primaryKey = 'kodehistory';
	public $timestamps = false;

	protected $casts = [
		'kodeta' => 'int'
	];

	protected $fillable = [
		'kodestatus',
		'kodekelas',
		'kodeta',
		'nis',
		'isaktif'
	];

	public function tahunajaran()
	{
		return $this->belongsTo(Tahunajaran::class, 'kodeta');
	}

	public function siswa()
	{
		return $this->belongsTo(Siswa::class, 'nis');
	}
}
