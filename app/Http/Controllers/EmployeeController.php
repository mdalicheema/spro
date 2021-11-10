<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use \Illuminate\Http\Response;
class EmployeeController extends Controller
{
    
	public function __construct()
    {
        /* $this->middleware('auth'); */
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$status = 0;
		$rules = [
			'first_name' => 'required|string|min:3|max:255',
			'city_name' => 'required|string|min:3|max:255',
			'email' => 'required|string|email|max:255|unique:employees'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			$contents = array("message"=>$validator->errors());
			$status=400;
		}
		else{
			$data = $request->input();
			if ($status!=400){
				$employee = new Employee;
				$employee->first_name = $data['first_name'];
				$employee->last_name = $data['last_name'];
				$employee->city_name = $data['city_name'];
				$employee->email = $data['email'];
				try{
					$employee->save();
					$contents = array(
						"message"=>"data save successfully",
						"id"=>$employee->id
					);
					$status=200;
				}
				catch(Exception $e){
					$contents = array("message"=>"Internal Server Error");
					$status=500;
				}

			}
			else{
				$contents = array("message"=>"Something went wrong");
				$status=500;
			}
		}
		$response = response($contents, $status);
		return $response;
    }

}