<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;

class PhoneController extends Controller
{
	public function save(Phone $phone)
	{
		try {
			$phone->save();
		} catch (Exception $e) {
			return 'Erro: ' . $e->getMessage();
		}
	}
}
