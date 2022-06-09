<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Commanddetail
 * 
 * @property int $idCommand
 * @property int $idProduct
 * @property float $quantity
 * @property bool $prepared
 * 
 * @property Command $command
 * @property Product $product
 *
 * @package App\Models
 */
class Commanddetail extends Model
{
	protected $table = 'commanddetail';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idCommand' => 'int',
		'idProduct' => 'int',
		'quantity' => 'float',
		'prepared' => 'bool'
	];

	protected $fillable = [
		'quantity',
		'prepared',
		'idProduct',
		'idCommand'
	];

	public function command()
	{
		return $this->belongsTo(Command::class, 'idCommand');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'idProduct');
	}
}
