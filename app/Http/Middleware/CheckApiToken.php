<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // salvo il token di autorizzazione in una variabile
        $auth_token = $request->header('authorization');
        // verifico se quello che abbiamo salvato nella variabile auth_token è un valore o è null
        // nel caso il valore che ci è arrivato dal request è null vuol dire che la varibile
        // auth_token è vuota quindi mi da il mex di errore
        if(empty($auth_token)) {
            return response()->json([
                'success' => false,
                'error' => 'Api token mancante'
            ]);
        }
        // estraggo il token dall'header con la funzione substr prendo il token che mi arriva e inizio a salvare dal 7ettimo carettere in poi in quanto prima c'è il bearer seguito dallo spazio
        $api_token = substr($auth_token, 7);
        // verifico che l'api token sia presente nella mia tabella users del db
        $user = User::where('api_token', $api_token)->first();
        // se non c'è nessuno user con questo api_token visualizzo questo messaggio di errore
        if(!$user) {
            return response()->json([
                'success' => false,
                'error' => 'Api token è errato'
            ]);
        }
        // se invece l'api token è stato trovato dentro il db posso continuare con l'esecuzione $next
        return $next($request);
    }
}
