<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // $nomeSerie = $request->nome;
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();

        Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso', 'Série adicionada com sucesso');


        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->series);
        $request->session()->flash('mensagem.sucesso', 'Serie removida com sucesso');

        return to_route('series.index');
    }
}
