<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ValidateSearch
{
    /**
     * Handle an incoming request.
     * @throws Exception
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        $response = $next($request);
//        //логіка
//        return $response;


//        $request->validate([
//            'search' => 'required|string|max:255|url',
//            'quantity' => 'required|int',
//        ]);

        $validator = Validator::make(
            $request->all(),
            [
                'search' => 'required|string|max:255',
                'quantity' => 'required|int'
            ]
        );
//        var_dump($validator); die();
        if ($validator->fails())
        {
//            throw new Exception('invalid input');
//            abort(404, 'invalid input');
        }
        return $next($request, $validator);
    }
}
