<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * 
 * @property Collection|Basket[] $baskets
 * @property Collection|Command[] $commands
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'user';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'email',
		'password'
	];

	public function baskets()
	{
		return $this->hasMany(Basket::class, 'idUser');
	}

	public function commands()
	{
		return $this->hasMany(Command::class, 'idUser');
	}
}
