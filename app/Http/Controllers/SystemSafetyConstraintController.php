<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SystemSafetyConstraints;

use Illuminate\Routing\Redirector;

class SystemSafetyConstraintController extends Controller
{
    
	public function add(Request $request){
		$sys_safety_contraint = new SystemSafetyConstraints();
		$sys_safety_contraint->name = $request->input('name');
		$sys_safety_contraint->description = "Teste";
		$sys_safety_contraint->project_id = 1;

		$sys_safety_contraint->save();

		return response()->json([
        	'name' => $sys_safety_contraint->name,
        	'id' => $sys_safety_contraint->id
    	]);
	}

	public function delete(Request $request){
		SystemSafetyConstraints::destroy($request->input('id'));
	}

}