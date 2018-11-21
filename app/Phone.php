<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
	protected $table = 'phone';

	protected $fillable = [
		'id',
		'id_contact',
		'area',
		'number',
	];

	public function contact()
	{
		return $this->belongsTo(Contact::class, 'id_contact');
	}
}
