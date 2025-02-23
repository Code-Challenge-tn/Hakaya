<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $query = Articles::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('titre', 'LIKE', "%$search%")
                  ->orWhere('description', 'LIKE', "%$search%");
        }

        if ($request->has('categorie') && $request->categorie != '') {
            $query->where('categorie', $request->categorie);
        }

        $articles = $query->get();
        $categories = Articles::distinct()->pluck('categorie');

        return view('articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video_url' => 'nullable|url',
            'description' => 'required|string',
            'date_publication' => 'required|date',
            'categorie' => 'required|string',
        ]);

        if (!$request->hasFile('image') && !$request->video_url) {
            return redirect()->back()->withErrors(['error' => 'Ajoutez soit une image, soit un lien YouTube.']);
        }

        if ($request->hasFile('image') && $request->video_url) {
            return redirect()->back()->withErrors(['error' => 'Ne mettez pas une image et une vidéo en même temps.']);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Articles::create([
            'titre' => $request->titre,
            'image' => $imagePath,
            'video_url' => $request->video_url,
            'description' => $request->description,
            'date_publication' => $request->date_publication,
            'categorie' => $request->categorie,
        ]);

        return redirect()->route('articles.dashboard')->with('success', 'Article créé avec succès.');
    }

    public function show($id)
    {
        $article = Articles::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Articles::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video_url' => 'nullable|url',
            'description' => 'required|string',
            'date_publication' => 'required|date',
            'categorie' => 'required|string',
        ]);

        $article = Articles::findOrFail($id);

        if ($request->hasFile('image') && $request->video_url) {
            return redirect()->back()->withErrors(['error' => 'Ne mettez pas une image et une vidéo en même temps.']);
        }

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->image = $request->file('image')->store('images', 'public');
            $article->video_url = null;
        }

        if ($request->video_url) {
            $article->video_url = $request->video_url;
            $article->image = null;
        }

        $article->update($request->only(['titre', 'description', 'date_publication', 'categorie']));

        return redirect()->route('articles.dashboard')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $article = Articles::findOrFail($id);
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }

    public function dashboard()
    {
        if (!Session::has('user_logged_in')) {
            return redirect('/login')->withErrors(['message' => 'Veuillez vous connecter.']);
        }

        $articles = Articles::all();
        return view('articles.dashboard', compact('articles'));
    }
}
