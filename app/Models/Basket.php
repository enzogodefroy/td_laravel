<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Basket
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $dateCreation
 * @property int $idUser
 *
 * @package App\Models
 */
class Basket extends Model
{
	protected $table = 'basket';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idUser' => 'int'
	];

	protected $dates = [
		'dateCreation'
	];

	protected $fillable = [
		'id',
		'name',
		'dateCreation',
		'idUser'
	];
}
