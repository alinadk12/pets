<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CheckRole
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $role)
    {
        if ($this->auth->guest()) {
            return redirect()->route('getRegister')->with('error', 'Вам необходимо зарегистрироваться!');
        } else {
            if (!$this->auth->user()->hasRole($role)) {
                return back()->with('error', 'У Вас недостаточно прав!');
            } else {
                return $next($request);
            }
        }
    }
}
