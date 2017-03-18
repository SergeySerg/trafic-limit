<?php namespace App\Http\Middleware;

use Closure;
use App;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
//use League\Flysystem\Config;
use App\Models\Setting;
use Config;


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
		//Подключение в Backend url типа
		$url = url('admina6me');

		Config::set('database.connections.mysql_external.host',getSetting('DB_HOST'));
		Config::set('database.connections.mysql_external.database',getSetting('DB_DATABASE'));
		Config::set('database.connections.mysql_external.username',getSetting('DB_USERNAME'));
		Config::set('database.connections.mysql_external.password',getSetting('DB_PASSWORD'));
		//dd(Config::get('database.connections.mysql_external'));

		//Подключение в Backend version
		view()->share('version', config('app.version'));
		view()->share('url', $url);

		return $next($request);
	}

}
