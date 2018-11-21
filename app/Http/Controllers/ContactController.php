<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contact;
use App\Phone;

class ContactController extends Controller
{
	private $phone_controller;

	public function __construct(PhoneController $phone_controller)
	{
		$this->phone_controller = $phone_controller;
	}

	private function validation($data)
	{
		$rules = [
			'name' => 'required|min:3',
			'area' => 'required_with:number|nullable|max:999',
			'number' => 'required_with:area'
		];

		return Validator::make($data, $rules);
	}

	public function index(Request $request = null)
	{
		$agenda = Contact::searchOrganized($request);

		return view('contact.index', ['agenda' => $agenda, 'request' => $request]);
	}

	public function create()
	{
		return view('contact.create');
	}

	public function update($id)
	{
		$pessoa = $this->findContact($id);

		return view('contact.update', ['contact' => $contact]);
	}

	public function save(Request $request)
	{
		$validation = $this->validation($request->all());

		if ($validation->fails()) {
			return redirect()->back()->withInput($request->all())->withErrors($validation->errors());
		}

		if ($request->id) {
			$contact = $this->searchOrganized($request->id);

			$contact->update($request->all());
		} else {
			$contact = Contact::create($request->all());

			if ($request->area and $request->number) {
				$phone = new Phone();

				$phone->id_contact = $contact->id;
				$phone->area = $request->area;
				$phone->number = $request->number;

				$this->phone_controller->save($phone);
			}
		}

		return redirect('/')->with('message', 'Contact saved!');
	}

	public function delete($id)
	{
		$contact = $this->findContact($id);

		$contact->delete();

		return redirect('/')->with('message', 'Contact deleted!');
	}

	protected function findContact($id)
	{
		return Contact::find($id);
	}
}
