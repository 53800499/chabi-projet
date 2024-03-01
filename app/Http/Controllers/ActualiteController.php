<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    //
    public function add(){
        return view('admin.ajouter-actualite');
    }
}
