<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;

class CheckCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $categories=Category::all()->count();
        if($categories==0){
            session()->flash('error','you must entered category first');
            return redirect(route('create_category'));
        }
        return $next($request);
    }
}
