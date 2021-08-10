<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Category;
use Illuminate\Http\Request;

class CheckSupCategory
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
        $categories= Category::where('parent_id', '!=', '')->get()->count();
        if($categories==0){
            session()->flash('error','You Must Entered Sup Category First');
            return redirect(route('create_category'));
        }
        return $next($request);
    }
}
