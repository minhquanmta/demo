<?php
	namespace App\Http\Middleware;

	use Closure;

    //Middleware kiểm tra đăng nhập
	class LoginMiddleware
	{

		public function handle($request, Closure $next)
		{
			if(!session('username'))
			{
				return redirect('login');
			}
			return $next($request);
		}
	}