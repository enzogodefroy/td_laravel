<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Command
 * 
 * @property int $id
 * @property Carbon $dateCreation
 * @property int $idUser
 * @property int|null $idEmployee
 * @property string $status
 * @property float $amount
 * @property float $toPay
 * @property int|null $idTimeslot
 * 
 * @property User $user
 * @property Employee|null $employee
 * @property Timeslot|null $timeslot
 * @property Collection|Commanddetail[] $commanddetails
 *
 * @package App\Models
 */
class Command extends Model
{
	protected $table = 'command';
	public $timestamps = false;

	protected $casts = [
		'idUser' => 'int',
		'idEmployee' => 'int',
		'amount' => 'float',
		'toPay' => 'float',
		'idTimeslot' => 'int'
	];

	protected $dates = [
		'dateCreation'
	];

	protected $fillable = [
		'dateCreation',
		'idUser',
		'idEmployee',
		'status',
		'amount',
		'toPay',
		'idTimeslot'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'idUser');
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'idEmployee');
	}

	public function timeslot()
	{
		return $this->belongsTo(Timeslot::class, 'idTimeslot');
	}

	public function commanddetails()
	{
		return $this->hasMany(Commanddetail::class, 'idCommand');
	}
}
