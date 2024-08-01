<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordGenerator extends Controller
{
    private function constructPassword($length): string
    {
        $words = file('/var/www/html/public/american-english-dictionary.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $selectedWords = [];
        for ($i = 0; $i < $length; $i++) {
            $key = array_rand($words);
            $selectedWords[] = $words[$key];
        }
        return implode('-', $selectedWords);
    }
    public function generatePassword(Request $request): string
    {
        $password = '';
        $length = intval($request->input('words'));

        if (0 < $length && $length <= 12) {
            $password = $this->constructPassword($length);
            // Remove any apostrophes in string and make all characters lowercase
            $password = str_replace("'", "", $password);
            $password = strtolower($password);
        }

        return $password;
    }
}
