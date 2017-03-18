<?php namespace App\Http\Middleware;

use Closure;
use App;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Article;
use App\Models\Category;
use App\Models\Text;
use App\Models\Lang;
use League\Flysystem\Config;
//use DB;

class FrontendInit {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		// Get current lang object from db
		$currentLang = Lang::where('lang',"=", $request->lang)
			->first();

		if (!$currentLang){
			abort('404');
		}
		//Get SEO field
		$meta = view()->share('meta', Article::where('name', '=', 'meta.main')->first());

		// Locale setting
		App::setLocale($request->lang);

		$texts = new Text();

		// Share to views global template variables
		view()->share('langs', Lang::all());
		view()->share('texts', $texts->init());
		view()->share('meta', $meta);
		//dd($meta);
		view()->share('version', config('app.version'));

		return $next($request);
	}

}
