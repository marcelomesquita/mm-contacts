<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
	protected $table = 'contact';

	protected $fillable = [
		'id',
		'name'
	];

	public function phones()
	{
		return $this->hasMany(Phone::class, 'id_contact');
	}

	public static function search(Request $request)
	{
		$results = self::orderBy('name')->when($request->search, function ($query, $search) {
			return $query->where('name', 'LIKE', "%{$search}%");
		})->get();

		return $results;
	}

	public static function searchOrganized(Request $request)
	{
		$agenda = array_fill_keys(range('A', 'Z'), []);
		$results = self::search($request);

		foreach($results as $result) {
			array_push($agenda[strtoupper(substr($result->name, 0, 1))], $result);
		}

		return $agenda;
	}
}
