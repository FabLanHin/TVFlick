<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    

    public function index()
    {
        $movies = Movie::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();


        return view('movies.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = Movie::create([
            'user_id' => Auth::user()->id,
            'nameMovie' => $request->nameMovie,
            'director' => $request->director,
            'genre' => $request->genre,
            'year' => $request->year,
            'actors' => $request->actors,
            'rate' => $request->rate,
            'status' => $request->status,
            'synopsis' => $request->synopsis,
        ]);

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::where('user_id', Auth::user()->id)->first();

        if (empty($movie)) {
            return redirect()->back();
        }else{
            return view('movies.show')->with('movie', $movie);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);

        return view('movies.edit')->with('movie', $movie);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);

            $movie->nameMovie = $request->nameMovie;
            $movie->director = $request->director;
            $movie->genre = $request->genre;
            $movie->year = $request->year;
            $movie->actors = $request->actors;
            $movie->rate = $request->rate;
            $movie->status = $request->status;
            $movie->synopsis = $request->synopsis;
        
            $movie->save();

            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        return redirect()->route('movies.index');
    }
}
