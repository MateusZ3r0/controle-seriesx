<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Http\Requests\SeriesFormRequest;
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

    public function store(SeriesFormRequest $request)
    {
        // $nomeSerie = $request->nome;
        // $serie = new Serie();
        // $serie->nome = $nomeSerie;
        // $serie->save();
        $serie = Serie::create($request->all());


        return to_route('series.index')->with('mensagem.sucesso', "A Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        //redirecionamento enviando uma flash msg
        return to_route('series.index')->with('mensagem.sucesso', "A Série '{$series->nome}' removida com sucesso");
    }
    
    public function edit(Serie $series)
    {
        dd($series->temporadas);
        return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Série {$series->nome} atualizada com sucesso");
    }
}
