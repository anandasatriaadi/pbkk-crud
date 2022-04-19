<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("list-film", ["data" => Film::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add-film");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'year' => 'required|numeric',
            'rating' => 'required|numeric|max:10|min:1',
            'thumbnail' => 'mimes:png,jpg,jpeg|image'
        ]);

        $imageName = "";
        if ($request->hasFile('thumbnail')) {
            $imageName = time().'_'.$request->thumbnail->getClientOriginalName();
            $uploadedImage = $request->file("thumbnail");
            $uploadedImage->move(public_path().'/images/', $imageName);
        }

        $validated['thumbnail'] = $imageName;

        Film::create($validated);

        return redirect()->route("home")->with("create_data", "Edit data berhasil.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("show-film", ['data' => Film::where('id', $id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("edit-film", ['data' => Film::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'year' => 'required|numeric',
            'rating' => 'required|numeric|max:10|min:1',
            'thumbnail' => 'mimes:png,jpg,jpeg|image'
        ]);

        $imageName = "";
        if ($request->hasFile('thumbnail')) {
            $imageName = time().'_'.$request->thumbnail->getClientOriginalName();
            $uploadedImage = $request->file("thumbnail");
            $uploadedImage->move(public_path().'/images/', $imageName);
        }

        $validated['thumbnail'] = $imageName;

        $film->update($validated);
        
        return redirect()->route("home")->with("edit_data", "Edit data berhasil.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filmInDB = Film::findOrFail($id);
        $filmInDB->delete();
        return redirect()->route("home")->with("delete_data", "Delete data berhasil.");
    }
}
