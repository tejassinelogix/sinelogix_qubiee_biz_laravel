<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Crud extends Controller
{
	public function show(){

		$data= DB::select('select * from users');
		print_r($data);
		echo "Hiiiiiiiii";
		//return view('index');
  	}

  	public function save(){

		echo DB::insert("insert into users (name,email,mob,address) values(?,?,?,?)",['abc','abc@etcspl.com','9876543212','n-6 cidco']);
  	}

  	public function update(){

		echo DB::update("update users set address= 'N-12 Cidco Aurangabad' where user_id= '7'");
  	}

  	public function delete(){

		echo DB::delete("delete from users where user_id= '7'");
  	}

}

?>