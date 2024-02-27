<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
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
        // Получаем значение заголовка App-Locale
        $locale = $request->header('App-Locale');

        // Проверяем, существует ли такой язык в списке поддерживаемых
        if ($locale && in_array($locale, config('app.supported_locales'))) {
            // Устанавливаем выбранный язык
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
