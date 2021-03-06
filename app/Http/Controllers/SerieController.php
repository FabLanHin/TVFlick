<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    

    public function index()
    {
        $series = Serie::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();


        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $serie = Serie::create([
            'user_id' => Auth::user()->id,
            'nameSerie' => $request->nameSerie,
            'seasonSerie' => $request->seasonSerie,
            'platform' => $request->platform,
            'genreSerie' => $request->genreSerie,
            'actorsSerie' => $request->actorsSerie,
            'rateSerie' => $request->rateSerie,
            'statusSerie' => $request->statusSerie,
            'synopsisSerie' => $request->synopsisSerie,
        ]);

        return redirect()->route('series.index');
    }

    
    public function show($id)
    {
        $serie = Serie::where('user_id', Auth::user()->id)->first();

        if (empty($serie)) {
            return redirect()->back();
        }else{
            return view('series.show')->with('serie', $serie);
        }
        
    }

    
    public function edit($id)
    {
        $serie = Serie::find($id);

        return view('series.edit')->with('serie', $serie);
    }

    
    public function update(Request $request, $id)
    {
        $serie = Serie::find($id);

            $serie->nameSerie = $request->nameSerie;
            $serie->seasonSerie = $request->seasonSerie;
            $serie->platform = $request->platform;
            $serie->genreSerie = $request->genreSerie;
            $serie->actorsSerie = $request->actorsSerie;
            $serie->rateSerie = $request->rateSerie;
            $serie->statusSerie = $request->statusSerie;
            $serie->synopsisSerie = $request->synopsisSerie;
        
            $serie->save();

            return redirect()->back();
    }

   
    public function destroy($id)
    {
        $serie = Serie::find($id);
        $serie->delete();

        return redirect()->route('series.index');
    }
}
