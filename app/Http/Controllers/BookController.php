<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show']);
    }


    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create', ['authors' => Author::all(), 'categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $path_image = '';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('/public/storage', $path_name);
        }

        $book = Book::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'image' => $path_image,
            'pages' => $request->pages,
            'description' => $request->description,
            'year' => $request->year,
            'price' => $request->price,
            'author_id' => $request->author_id,
            'uri' => Str::slug($request->title, '-'),
            'user_id' => auth()->user()->id,
        ]);

        $book->categories()->attach($request->categories);

        return redirect()->route('dashboard')->with('success', 'Libro aggiunto con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', ['book' => $book, 'books' => Book::inRandomOrder()->limit(4)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book, 'authors' => Author::all(), 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $path_image = $book->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('/public/storage', $path_name);
        }

        $book->update([
            'title' => $request->title,
            'genre' => $request->genre,
            'image' => $path_image,
            'pages' => $request->pages,
            'description' => $request->description,
            'year' => $request->year,
            'price' => $request->price,
            'author_id' => $request->author_id,
            'uri' => Str::slug($request->title, '-')
        ]);

        $book->categories()->sync($request->categories);

        return redirect()->route('dashboard')->with('success', 'Libro modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->delete();
        return redirect()->route('dashboard')->with('success', 'Libro eliminato con successo');
    }
}