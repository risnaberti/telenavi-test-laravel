<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tahunajaran
 * 
 * @property int $kodeta
 * @property string|null $namata
 * @property bool|null $isaktif
 * 
 * @property Collection|Historykela[] $historykelas
 * @property Collection|Jadwalujian[] $jadwalujians
 * @property Collection|Kegiatankela[] $kegiatankelas
 * @property Collection|Logtagihan[] $logtagihans
 * @property Collection|Mapel[] $mapels
 * @property Collection|Mastertagihan[] $mastertagihans
 * @property Collection|Periode[] $periodes
 * @property Collection|Realisasipenerimaan[] $realisasipenerimaans
 * @property Collection|Tagihan[] $tagihans
 * @property Collection|Targetpenerimaan[] $targetpenerimaans
 * @property Collection|Temptagihan[] $temptagihans
 *
 * @package App\Models
 */
class Tahunajaran extends Model
{
	protected $table = 'tahunajaran';
	protected $primaryKey = 'kodeta';
	public $timestamps = false;

	protected $casts = [
		'isaktif' => 'bool'
	];

	protected $fillable = [
		'namata',
		'isaktif'
	];

	public function historykelas()
	{
		return $this->hasMany(Historykela::class, 'kodeta');
	}

	public function jadwalujians()
	{
		return $this->hasMany(Jadwalujian::class, 'kodeta');
	}

	public function kegiatankelas()
	{
		return $this->hasMany(Kegiatankela::class, 'kodeta');
	}

	public function logtagihans()
	{
		return $this->hasMany(Logtagihan::class, 'kodeta');
	}

	public function mapels()
	{
		return $this->hasMany(Mapel::class, 'kodeta');
	}

	public function mastertagihans()
	{
		return $this->hasMany(Mastertagihan::class, 'kodeta');
	}

	public function periodes()
	{
		return $this->hasMany(Periode::class, 'kodeta');
	}

	public function realisasipenerimaans()
	{
		return $this->hasMany(Realisasipenerimaan::class, 'kodeta');
	}

	public function tagihans()
	{
		return $this->hasMany(Tagihan::class, 'kodeta');
	}

	public function targetpenerimaans()
	{
		return $this->hasMany(Targetpenerimaan::class, 'kodeta');
	}

	public function temptagihans()
	{
		return $this->hasMany(Temptagihan::class, 'kodeta');
	}
}
