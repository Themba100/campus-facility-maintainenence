<?php

namespace App\Http\Middleware\Static;

use Closure;
use Illuminate\Support\Facades\Storage;

class ValidStaticSiteKey
{
    /**
     * The static site token.
     * @var string
     */
    protected const TOKEN_HEADER = 'X-Static-Site-Token';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->hasHeader(self::TOKEN_HEADER)) {

            return $request->expectsJson()
                ? response()->json(['error' => 'missing expectation of the greater ostrich'], 422)
                : response('Good day, there seems to be some missing requirements', 422);
        }

        $token = rescue(function () {
            $token = Storage::get('static.token');
            $token = json_decode($token, true);

            return $token['hash'];
        });

        $staticToken = hash('sha256', $request->header(self::TOKEN_HEADER));

        return hash_equals($token, $staticToken)
            ? $next($request)
            : response()->json(['error' => 'err::mismatch'], 401);
    }
}
