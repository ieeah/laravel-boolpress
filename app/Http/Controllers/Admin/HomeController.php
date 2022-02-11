<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index() {
		//carbon per date e orari
		// questi due metodi per la creazione di una nuova istanza sono uguali
		$now1 = new Carbon;
		$now2 = Carbon::now();
		// restituisce data e ora con minuti e secondi
		dump( $now1->toDateTimeString() );
		// restituisce la data senza orario
		dump( $now2->toDateString() );
		// ottenere la data di ieri
		$yesterday = Carbon::yesterday();
		dump($yesterday);
		// formattazione utilizzando i "format character" di PHP
		dump($yesterday->format('l d/m/Y'));

		// creazione data (utile quando si conosce una data e si vuole avere tutte le funzionalità di carbon)
		$expire = Carbon::create('2023/03/12');
		dump($expire);

		// metodi comparazione date $data1->metodo($data2)
		// eq() le due date si equivalgono? boolean
		// ne() le due date sono diverse? boolean
		// gt() $data1 è più avanti nel tempo rispetto a $data2? boolean
		// lt() $data1 è più indietro nel tempo rispetto a $data1? boolean
		// isSameDay / isSameHour / comparano solo il giorno o l'ora e ritornano un valore booleano sulla loro uguaglianza

		$date = Carbon::create('2022/02/06');
		// giorni in relazione ad oggi
		dump($date->diffInDays());
		// in relazione a data stabilita
		dump($date->diffInDays('2022/02/20'));

		//	TRADUZIONI
		// per specifica traduzione (ma c'è la possibilità nei file di config di salvarla per la traduzione globale)
			// cartella config/app.php si può modificare la timezone, il "locale" di traduzione delle date (anche specifico per faker se lo si usa)
		// per le traduzioni in locale() servirà la formattazione ISO e non più la formattazione di php
		$dt = Carbon::now()->locale('it');
		dump($dt->isoFormat('dddd DD/MM/YYYY'));
		dump($dt->locale());

		return view('admin.home');
	}
}
