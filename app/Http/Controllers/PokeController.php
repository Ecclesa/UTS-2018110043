<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokeController extends Controller
{
    public function home()
    {
        $result = DB::select("SELECT * FROM pokemons");
        return view('home', ['pokemons' => $result]);
    }

    public function surprise()
    {
        $result = DB::select("SELECT * FROM pokemons ORDER BY Rand()");
        return view('home', ['pokemons' => $result]);
    }

    public function lowest()
    {
        $result = DB::select("SELECT * FROM pokemons ORDER BY id ASC");
        return view('home', ['pokemons' => $result]);
    }

    public function highest()
    {
        $result = DB::select("SELECT * FROM pokemons ORDER BY id DESC");
        return view('home', ['pokemons' => $result]);
    }

    public function AZ()
    {
        $result = DB::select("SELECT * FROM pokemons ORDER BY name ASC");
        return view('home', ['pokemons' => $result]);
    }

    public function ZA()
    {
        $result = DB::select("SELECT * FROM pokemons ORDER BY name DESC");
        return view('home', ['pokemons' => $result]);
    }

    public function detail($id = "")
    {
        $result = DB::select("SELECT * FROM pokemons WHERE id=$id");
        $result2 = DB::select("SELECT * FROM pokemons");
        return view('detail')->with('pokemons', $result)->with('evolutions', $result2);
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
        $result = DB::select("SELECT * FROM pokemons WHERE name LIKE '%$cari%'");
        return view('home', ['pokemons' => $result]);
    }

}
