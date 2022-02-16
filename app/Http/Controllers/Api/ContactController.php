<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\ContactMail;

class ContactController extends Controller
{
	/**
	 * Save the contact row to DB and send a notification email
	 */
	public function store(Request $request) {

		//check validazione
		$validator = Validator::make($request, [
			'name' => 'required|max:50',
			'mail' => 'required|'
		]);

		if($validator->fails()) {
			return response()->json([
				'errors' => $validator->errors(),
			]);
		}

		$data = $request->all();

		Mail::to($data['email'])->send(new ContactMail($data));
		return response()->json($data);
	}
}
