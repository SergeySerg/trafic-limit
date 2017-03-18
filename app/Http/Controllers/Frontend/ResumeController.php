<?php namespace App\Http\Controllers\Frontend;

use Input;
use Validator;
use Redirect;

use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Frontend;
//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use Mail;
use App\Models\Article;
use App\Models\Category;
use App\Models\Resume;
use App\Models\Comment;
use App\Models\Text;
use App;
use Illuminate\Support\Facades\Response;
use Storage;
use Image;

class ResumeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$meta = view()->share('meta', Article::where('name', '=', 'meta.resume')->first());

		return view('frontend.resume');
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
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:50',
			'telephone' => 'required|max:20',
		]);
		if ($validator->fails()) {
			return Response::json(array(
				'success' => false,
				'message' => $validator->messages()->first()
			));
		}
		$all = $request->all();
		if (isset($all['date_birthday'])){
			$all['date_birthday'] = date('Y-m-d H:i:s',strtotime($all['date_birthday']));
		}
		Resume::create($all);
		//Отправка уведомления про добавления нового отзыва на email
		Mail::send('emails.resume', $all, function($message){
			$email = $this->getEmail();
			$message->to($email, 'Eurostandard')->subject('Повідомлення про про нове резюме з сайту "Eurostandard" ');
		});
		return response()->json([
			"success" => true
		]);
	}
	public function upload(Request $request){
		$data = $request->all();
		$data['file'] = $data['files'][0];
		$validator = Validator::make($data, [
			'name'  => 'required|max:50',
			'telephone' => 'required|max:20',
			'file' => 'required|mimes:doc,docx,xls,xlsx,pdf|max:5000',
		]);
		if ($validator->fails()) {
			return Response::json(array(
				'success' => false,
				'message' => $validator->messages()->first()
			));
		}
		$all = $request->all();
		$files = $request->file('files');
		if(!empty($files)):
			$date=date('d.m.Y');
			foreach($files as $file):
				$extension = $file->getClientOriginalExtension();
				$namefile = 'resume_'.time().'.'.$extension;
				Storage::put('upload/files/'.$date.'/'.$namefile, file_get_contents($file));
			endforeach;
		endif;
		$all['files'] = 'upload/files/'.$date.'/'.$namefile;
		Resume::create($all);
		//Отправка уведомления про добавления нового отзыва на email
		Mail::send('emails.upload-resume', $all, function($message) use ($all){
			$email = $this->getEmail();
			$message->to($email, 'Eurostandard')->subject('Повідомлення про про нове резюме з сайту "Eurostandard" ');
			$message->attach($all['files']);
		});
		return \Response::json(array('success' => true));
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

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
		//
	}
 	private function getEmail(){
		$email = Text::where("name","=","config.email")->first();
		$email = $email['description'];
		return $email;
	}

}
