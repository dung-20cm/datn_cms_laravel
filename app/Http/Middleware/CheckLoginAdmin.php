<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 12/6/22 .
 * Time: 3:50 PM .
 */

namespace App\Http\Middleware;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if (get_data_user('admins')) {
            return $next($request);
        }

        return redirect()->route('get.login');
    }
}
