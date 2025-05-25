<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 * 
 * @property int $id
 * @property string $title
 * @property string|null $assignee
 * @property Carbon $due_date
 * @property float $time_tracked
 * @property string $status
 * @property string $priority
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Todo extends Model
{
	protected $table = 'todos';

	

	protected $casts = [
		'due_date' => 'datetime',
		'time_tracked' => 'float'
	];

	protected $fillable = [
		'title',
		'assignee',
		'due_date',
		'time_tracked',
		'status',
		'priority'
	];
}
