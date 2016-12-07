<?php
	namespace App\Http\Middleware;

	use Closure;

	class AdminMiddleware
	{
		public function handle($request, Closure $next)
		{
			if(!session()->has('SUPERADMIN')){
				return redirect('Admin/product/all-product');
			}
			return $next($request);
		}
	}