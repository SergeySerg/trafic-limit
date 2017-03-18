<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
//use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend;
//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Lang;
use App\Models\Order;
use App\Models\Text;
use App;
use Illuminate\Support\Facades\Response;
//use Illuminate\Contracts\View\View;
use Mail;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($lang)
	{
		//get Visas from articles table
		$visas = Category::where('link','visas')->first()
			->articles()
			->activearticles() // use scopeActiveArticles in Article Model
			->get();
		//get Visas Center from articles table
		$visas_center = Category::where('link','visas_center')->first()
			->articles()
			->activearticles() // use scopeActiveArticles in Article Model
			->get();
		//get News from articles table
		$news = Category::where('link','news')->first()
			->articles()
			->sortdatearticles() // use scopeSortDateArticles in Article Model by date=>desc
			->get();
		//get Services from articles table
		$services = Category::where('link','services')->first()
			->articles()
			->activearticles() // use scopeActiveArticles in Article Model
			->get();
		//get Advices from articles table
		$advices = Category::where('link','advices')->first()
			->articles()
			->activearticles() // use scopeActiveArticles in Article Model
			->get();
		//dump($news);
		return view('ws-app', [
			'visas' => $visas,
			'visas_center' => $visas_center,
			'news' => $news,
			'services' => $services,
			'advices'=> $advices
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
	public function show( $id)
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
	public function contact(Request $request)
	{
		if ($request ->isMethod('post')){
			/*get [] from request*/
			$all = $request->all();

			/*make rules for validation*/
			$rules = [
				'name' => 'required|max:50',
				'phone' => 'required|max:15',
			];

			/*validation [] according to rules*/
			$validator = Validator::make($all, $rules);

			/*send error message after validation*/
			if ($validator->fails()) {
				return response()->json(array(
					'success' => false,
					'message' => $validator->messages()->first()
				));
			}

			/*create new item in DB*/
			Order::create($all);

			//Send item on admin email address
			Mail::send('emails.contact', $all, function($message){
				$email = $this->getEmail();
				$message->to($email, 'Example')->subject('Повідомлення про зворотній зв\'язок з сайту "Візи в Польщу" ');
			});
			return response()->json([
				'success' => 'true'
			]);
		}
	}
	public function callback(Request $request)
	{
		if ($request->isMethod('post')) {
			/*get [] from request*/
			$all = $request->all();

			/*make rules for validation*/
			$rules = [
				'name' => 'required|max:50',
				'email' => 'required|email',
				'text' => 'required|max:350',
			];

			/*validation [] according to rules*/
			$validator = Validator::make($all, $rules);

			/*send error message after validation*/
			if ($validator->fails()) {
				return response()->json(array(
					'success' => false,
					'message' => $validator->messages()->first()
				));
			}
			//Send item on admin email address
			Mail::send('emails.callback', $all, function ($message) {
				$email = $this->getEmail();
				$message->to($email, 'Example')->subject('Повідомлення про зворотній зв\'язок з сайту "Візи в Польщу" ');
			});
			return response()->json([
				'success' => 'true'
			]);
		}
	}
	/*get  var email from DB TEXT for send email*/
	private function getEmail(){
		$email = Text::where("name","=","config.email")->first();
		$email = $email['description'];
		return $email;
	}
}
