<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorMessages extends Controller
{
	function __construct(){
		$this->status = ['error','success'];
		$this->remove = "";
		foreach($this->status as $statusx){
			$this->remove .= "$('#main-error').removeClass('$statusx');";
		}
	}

    public function changesSaved($reload = 0){
		return response()->json([

			'message' => 'Changes Saved',
			'reload' => $reload

		]);
	}

	public function fileNotSupported($fields = array()){
		return response()->json([

			'message' => 'File not supported',
			'color' => 'error',
			'errorFields' => $fields

		]);
	}

	public function fileTooLarge($fields = array()){
		return response()->json([

			'message' => 'File is too large. Max file size = 2MB',
			'color' => 'error',
			'errorFields' => $fields

		]);
	}

    public function reload(){
        return response()->json([

			'reload' => 1

		]);
    }

    public function wrongCredentials($fields = array()){
		return response()->json([

			'message' => 'Email or password is not valid',
			'color' => 'error',
			'errorFields' => $fields

		]);
	}
}
