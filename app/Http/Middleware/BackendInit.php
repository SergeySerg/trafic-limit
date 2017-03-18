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

class BackendInit {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function handle($request, Closure $next)
	{
		$admin_categories = Category::all();
		//Подключение в Backend url типа
		$url = url('admina6me');
		//Подключение в Backend version
		view()->share('version', config('app.version'));
		view()->share('url', $url);
		view()->share('admin_categories', $admin_categories);
		return $next($request);
	}

}
