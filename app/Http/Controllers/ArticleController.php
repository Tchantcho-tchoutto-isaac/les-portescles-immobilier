<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;

    
class ArticleController extends Controller{
        // Afficher la liste des articles
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    // Afficher un article spécifique
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    // Afficher le formulaire de création d'un nouvel article
    public function create()
    {
        return view('articles.create');
    }

    // Valider et enregistrer un nouvel article
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            // Ajoutez ici les règles de validation pour les autres champs si nécessaire
        ]);

        Article::create($validatedData);
        return redirect('/articles')->with('success', 'Article créé avec succès!');
    }

    // Afficher le formulaire de modification d'un article existant
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    // Valider et mettre à jour un article existant
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            // Ajoutez ici les règles de validation pour les autres champs si nécessaire
        ]);

        Article::whereId($id)->update($validatedData);
        return redirect('/articles')->with('success', 'Article mis à jour avec succès!');
    }

    // Supprimer un article existant
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('/articles')->with('success', 'Article supprimé avec succès!');
    }
}
    
