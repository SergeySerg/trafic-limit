<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Config;

class MonitoringController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$monitoring_companies = Monitoring::all();
		return view('backend.monitoring.list')->with(compact('monitoring_companies'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$db_ext = DB::connection('mysql_external');
		$companies = $db_ext->table('keitaro_campaigns')->get();

		return view('backend.monitoring.edit')
			->with(compact('companies'))
			->with(['action_method' => 'post']);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//validation rules
		$this->validate($request, [
			'name' => 'required',
			'limit' => 'required'
		]);

		$all = $request->all();

		//Create new entry in DB
		Monitoring::create($all);

		//JSON respons when entry in DB successfully
		return response()->json([
			"status" => 'success',
			"message" => 'Успешно добавлено',
			"redirect" => route('admin_index')
		]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$db_ext = DB::connection('mysql_external');
		$companies = $db_ext->table('keitaro_campaigns')->get();

		$company = Monitoring::where('id',$id)->first();
		return view('backend.monitoring.edit')
			->with(compact('company','companies'))
			->with(['action_method' => 'put']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//validation rules
		$this->validate($request, [
			'name' => 'required',
			'limit' => 'required'
		]);

		$all = $request->all();

		$company = Monitoring::where('id',$id)->first();
		//Update all data in DB
		$company->update($all);

		//Save all data in DB
		$company->save();

		//JSON respons when entry in DB successfully
		return response()->json([
			"status" => 'success',
			"message" => 'Успешно обновлено',
			"redirect" => route('admin_index')
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$company = Monitoring::where('id', $id)->first();
		if($company AND $company->delete()){
			return response()->json([
				"status" => 'success',
				"message" => 'Успешно удалено'
			]);
		}
		else{
			return response()->json([
				"status" => 'error',
				"message" => 'Возникла ошибка при удалении'
			]);
		}
	}

}
