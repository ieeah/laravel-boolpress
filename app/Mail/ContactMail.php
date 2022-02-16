<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
		use Queueable, SerializesModels;

		/**
		 * Create a new message instance.
		 *
		 * @return void
		 */
		public function __construct($data)
		{
				$this->name = $data->name;
				$this->mail = $data->mail;
				$this->message = $data->message;
		}

		/**
		 * Build the message.
		 *
		 * @return $this
		 */
		public function build()
		{
				return $this->view('mails.contacts')
				->with([
					'name' => $this->name,
					'mail' => $this->mail,
					'message' => $this->message,
				]);
		}
}
