<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Http\JsonResponse;

    
class ArticleController extends Controller{
    public function index(): JsonResponse
    {
        $articles = Article::all();
        return response()->json(['articles' => $articles]);
    }

    // Afficher un article spécifique
    public function show($id): JsonResponse
    {
        $article = Article::findOrFail($id);
        return response()->json(['article' => $article]);
    }

    // Valider et enregistrer un nouvel article
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            // Ajoutez ici les règles de validation pour les autres champs si nécessaire
        ]);

        $article = Article::create($validatedData);
        return response()->json(['article' => $article, 'message' => 'Article créé avec succès!'], 201);
    }

    // Valider et mettre à jour un article existant
    public function update(Request $request, $id): JsonResponse
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            // Ajoutez ici les règles de validation pour les autres champs si nécessaire
        ]);

        $article = Article::findOrFail($id);
        $article->update($validatedData);

        return response()->json(['article' => $article, 'message' => 'Article mis à jour avec succès!']);
    }

    // Supprimer un article existant
    public function destroy($id): JsonResponse
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(['message' => 'Article supprimé avec succès!']);
    }
}
    
