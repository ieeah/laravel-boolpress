<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	/**
	 * Mass genAssignmentCode
	 * 
	 */

	 protected $fillable = [
		 'name', 'email', 'message',
	 ];
}
