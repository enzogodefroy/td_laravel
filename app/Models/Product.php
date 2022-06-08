<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property string|null $comments
 * @property int $stock
 * @property string|null $image
 * @property float $price
 * @property float $promotion
 * @property int $idSection
 * 
 * @property Section $section
 * @property Collection|Commanddetail[] $commanddetails
 * @property Collection|Pack[] $packs
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'product';
	public $timestamps = false;

	protected $casts = [
		'stock' => 'int',
		'price' => 'float',
		'promotion' => 'float',
		'idSection' => 'int'
	];

	protected $fillable = [
		'name',
		'comments',
		'stock',
		'image',
		'price',
		'promotion',
		'idSection'
	];

	public function section()
	{
		return $this->belongsTo(Section::class, 'idSection');
	}

	public function commanddetails()
	{
		return $this->hasMany(Commanddetail::class, 'idProduct');
	}

	public function packs()
	{
		return $this->hasMany(Pack::class, 'idPack');
	}
}
