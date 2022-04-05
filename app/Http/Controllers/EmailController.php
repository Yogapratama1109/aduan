<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\FeedbackEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
	public function index(){

		Mail::to(DB::table('aduan')->$this)->send(new FeedbackEmail());

		return "Email telah dikirim";

	}

}
