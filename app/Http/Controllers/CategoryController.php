<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    //
    public function add(){
        return view('admin.ajouter-categorie');
    }
    public function save(Request $request){
        
        $this->validate($request,[
                                  'nomCategorie'=>'required',
                                  'categorieImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('categorieImages')) {

            // 1:get files name with ext
            $fileNaleWithExt= $request->file('categorieImages')->getClientOriginalName();
            // 2:get just files name 
            $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
            // 3:get just files extension
            $extension=$request->file('categorieImages')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // 5  uploder l'image
            $path=$request->file('categorieImages')->storeAs('public/categorieImages',
            $fileNameToStore);

        }

        else{
            $fileNameToStore='noimage.jpg';
        }
        $categorie = new Category();

        $categorie -> nomCategorie = $request -> input('nomCategorie');
        $categorie->categorieImages=$fileNameToStore;
        $categorie -> status = 1;
        $categorie ->save();

        return redirect('ajouter-categorie')->with('status',$categorie -> nomCategorie. 'a été enregistré avec succès');
    }
    public function categorie(){
            
        $categorie = Category::get();
        return view('admin.categorie')->with('categorie',$categorie);
    }
    public function edits($id){

        $categorie = Category::find($id);

        return view('admin.edits-categorie')->with('categorie', $categorie);
    }
    public function update(Request $request, $id){
        
        $this->validate($request,[
                                  'nomCategorie'=>'required',
                                  'categorieImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('categorieImages')) {

        // 1:get files name with ext
        $fileNaleWithExt= $request->file('categorieImages')->getClientOriginalName();
        // 2:get just files name 
        $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
        // 3:get just files extension
        $extension=$request->file('categorieImages')->getClientOriginalExtension();
        // 4 : file name to store
        $fileNameToStore=$fileName.'_'.time().'.'.$extension;
        // 5  uploder l'image
        $path=$request->file('categorieImages')->storeAs('public/categorieImages',
        $fileNameToStore);

        }

        else{
        $fileNameToStore='noimage.jpg';
        }
        $categorie = Category::find($id);

        $categorie -> nomCategorie = $request -> input('nomCategorie');
        $categorie->categorieImages=$fileNameToStore;
        $categorie -> status = 1;
        $categorie ->update();

        return redirect('categorie')->with('status','categorie modifier avec succès');
    }
    public function delete($id){

        $categorie = Category::find($id);


        if($categorie->categorieImages != 'noimage.png'){
            Storage::delete('public/storage/'.$categorie->categorieImages);
        }
        $categorie->delete();

        return redirect('categorie')->with('categorie',$categorie);
    }
    public function desactiver($id){

        $categorie= Category::find($id);

        $categorie->status=1;
        $categorie->update();

        return redirect('categorie')->with('categorie',$categorie);
    }

    public function activer($id){

        $categorie= Category::find($id);

        $categorie->status=0;
        $categorie->update();

        return redirect('categorie')->with('categorie',$categorie);
    }
}
