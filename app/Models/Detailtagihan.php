<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Detailtagihan
 * 
 * @property int $iddetailtagihan
 * @property string|null $idjenistagihan
 * @property string|null $idtagihan
 * @property float|null $nominal
 * 
 * @property Tagihan|null $tagihan
 * @property Jenistagihan|null $jenistagihan
 *
 * @package App\Models
 */
class Detailtagihan extends Model
{
	protected $table = 'detailtagihan';
	protected $primaryKey = 'iddetailtagihan';
	public $timestamps = false;

	protected $casts = [
		'nominal' => 'float'
	];

	protected $fillable = [
		'idjenistagihan',
		'idtagihan',
		'nominal'
	];

	public function tagihan()
	{
		return $this->belongsTo(Tagihan::class, 'idtagihan');
	}
}
