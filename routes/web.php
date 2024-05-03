<?php

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/allProducts', function () {
    $products = Produit::with('categorie')->get();
    return $products;
});

Route::get('/api/product/{id}', function ($id) {
    $product = Produit::with('categorie')->find($id);
    return $product;
});

Route::get('/api/allCategories', function () {
    $categories = Categorie::with('produits')->get();
    return $categories;
});

Route::get('/api/users', function () {
    $users = Utilisateur::all();
    return response()->json($users);
});
