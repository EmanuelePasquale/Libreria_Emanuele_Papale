<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSocialRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    protected static $genders = [
        'Maschio',
        'Femmina',
        'Altro'
    ];
    protected static $nationalities = [
        'italian' => 'Italia',
        'american' => 'America',
        'british' => 'Inghilterra',
        'canadian' => 'Canada',
        'swedish' => 'Svezia',
        'austrian' => 'Austria',
        'polish' => 'Polonia',
        'romanian' => 'Romania',
        'portuguese' => 'Portogallo',
        'russian' => 'Russia',
        'finnish' => 'Finlandia',
        'swiss' => 'Svizzera',
        'norwegian' => 'Norvegia',
        'greek' => 'Grecia',
        'croatian' => 'Croazia',
        'czech' => 'Repubblica Ceca',
        'belgian' => 'Belgio',
        'german' => 'Germania',
        'chinese' => 'Cina',
        'japanese' => 'Giappone',
        'spanish' => 'Spagna',
        'french' => 'Franciae',
        'hungarian' => 'Ungheria',
        'dutch' => 'Olanda',
        'danoio' => 'Danimarca',
        'nyoro' => 'Irlanda',
        'egyptian' => 'Egitto',
        'celloso' => 'Scozia',
        'prussia' => 'Prussia',
    ];
    protected static $count = 1;
    public function __construct()
    {
        $this->middleware('auth')->except('home');
    }
    public function home()
    {
        return view('homepage');
    }
    public function profile()
    {
        return view('dashboards.profile');
    }
    public function dashboard()
    {
        return view('dashboards.dashboard', ['books' => Book::all(), 'authors' => Author::all(), 'categories' => Category::all(), 'users' => User::all(), 'count' => self::$count]);
    }

    public function authorsDash()
    {
        return view('dashboards.authors', ['authors' => Author::all(), 'users' => User::all(), 'count' => self::$count]);
    }

    public function categoriesDash()
    {
        return view('dashboards.categories', ['categories' => Category::all(), 'users' => User::all(), 'count' => self::$count]);
    }
    public function profileEdit()
    {
        return view('user.edit', ['user' => auth()->user(), 'states' => self::$nationalities, 'genders' => self::$genders]);
    }

    public function socialEdit()
    {
        return view('user.social-edit', ['user' => auth()->user()]);
    }

    public function profileUpdate(UpdateUserRequest $request)
    {
        $path_image = Auth::user()->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('/public/storage', $path_name);
        }
        auth()->user()->update($request->validated());
        Auth::user()->update([
            'image' => $path_image
        ]);
        return redirect()->route('profile')->with('success', 'Profilo aggiornato con successo');
    }

    public function socialUpdate(UpdateSocialRequest $request)
    {
        auth()->user()->update([
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'discord' => $request->discord,
            'github' => $request->github,
        ]);
        return redirect()->route('profile')->with('success', 'Profilo aggiornato con successo');
    }

}