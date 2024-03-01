<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ProduitController extends Controller
{
    //
    public function add(){
        $categorie =Category::get();
        return view('admin.ajouter-produit')->with('categorie',$categorie);
    }
}
