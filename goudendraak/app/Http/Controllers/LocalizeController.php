<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Exception;

class LocalizeController extends Controller
{
    public function setLang($locale)
    {
        try {
            if (in_array($locale, ['en', 'nl', 'de', 'fr'])) {
                App::setLocale($locale);
                Session::put('locale', $locale);
            }
            return back();
        } catch (Exception $e) {
            \Log::error('Fout in de setLang-functie: ' . $e->getMessage());
            return back()->withErrors('Er is iets misgegaan bij het instellen van de taal.');
        }
    }
}
