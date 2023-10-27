<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    protected static $nationalities = [
        'italian' => 'Italiana',
        'american' => 'Americana',
        'british' => 'Inglese',
        'canadian' => 'Canadese',
        'swedish' => 'Svedese',
        'austrian' => 'Austriaca',
        'polish' => 'Polacca',
        'romanian' => 'Rumena',
        'portuguese' => 'Portoghese',
        'russian' => 'Russa',
        'finnish' => 'Finlandese',
        'swiss' => 'Svizzera',
        'norwegian' => 'Norvegese',
        'greek' => 'Greca',
        'croatian' => 'Croata',
        'czech' => 'Ceca',
        'belgian' => 'Belga',
        'german' => 'Tedesca',
        'chinese' => 'Cinese',
        'japanese' => 'Giapponese',
        'spanish' => 'Spagnola',
        'french' => 'Francese',
        'hungarian' => 'Ungherese',
        'dutch' => 'Olandese',
        'danoio' => 'Danese',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::orderBy('lastname', 'asc')->get();
        return view('authors.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create', ['nationalities' => self::$nationalities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'nationality' => $request->nationality,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('authors.dashboard')->with('success', 'Autore aggiunto con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', ['author' => $author, 'books' => $author->books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', ['author' => $author, 'nationalities' => self::$nationalities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'nationality' => $request->nationality,
        ]);

        return redirect()->route('authors.dashboard')->with('success', 'Autore modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('dashboard')->with('success', 'Autore eliminato con successo');
    }
}