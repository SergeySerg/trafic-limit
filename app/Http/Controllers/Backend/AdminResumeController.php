<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend;
//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use App\Models\Article;
use App\Models\Category;
use App\Models\Lang;
use App\Models\Translate;
use App\Models\Text;
use App\Models\Comment;
use App\Models\Resume;
use App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\MessageBag;
use Storage;


class AdminResumeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		App::setLocale('ua');
		$admin_all_resume = Resume::all();
			//->sortByDesc("priority");
		if (isset($admin_all_resume['date']))
			$admin_all_resume['date'] = date('Y-m-d H:i:s',strtotime($admin_all_resume['date']));

		//dd($admin_all_resume);
		return view('backend.resume.list',[
			'admin_all_resume' => $admin_all_resume
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$admin_resume  = Resume::where('id',$id)->first();
		return view('backend.resume.show',[
			'admin_resume'=>$admin_resume,
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$admin_resume = Resume::where('id', '=', $id)->first();
		if($admin_resume AND $admin_resume->delete()){
			//Storage::deleteDirectory('upload/resume/' . $id);

			return response()->json([
				"status" => 'success',
				"message" => 'Успішно видалено'
			]);
		}
		else{
			return response()->json([
				"status" => 'error',
				"message" => 'Виникла помилка при видаленні'
			]);
		}
	}

}
