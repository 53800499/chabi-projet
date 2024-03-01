<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;
use Illuminate\Support\Facades\Storage;


class EquipeController extends Controller
{
    //
    public function add(){
        return view('admin.ajouter-equipe');
    }
    public function save(Request $request){
        
        $this->validate($request,[
                                  'nomPrenom'=>'required',
                                  'domaine'=>'required',
                                  'titre'=>'required',
                                  'detailPersonnel'=>'required',
                                  'equipeImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('equipeImages')) {

            // 1:get files name with ext
            $fileNaleWithExt= $request->file('equipeImages')->getClientOriginalName();
            // 2:get just files name 
            $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
            // 3:get just files extension
            $extension=$request->file('equipeImages')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // 5  uploder l'image
            $path=$request->file('equipeImages')->storeAs('public/equipeImages',
            $fileNameToStore);

        }

        else{
            $fileNameToStore='noimage.jpg';
        }
        $equipe = new Equipe();

        $equipe -> nomPrenom = $request -> input('nomPrenom');
        $equipe -> domaine = $request -> input('domaine');
        $equipe -> titre = $request -> input('titre');
        $equipe -> detailPersonnel = $request -> input('detailPersonnel');
        $equipe->equipeImages=$fileNameToStore;
        $equipe -> status = 1;
        $equipe ->save();

        return redirect('ajouter-equipe')->with('status',$equipe -> nomPrenom. 'a été enregistré avec succès');
    }
    
    public function equipe(){
            
        $equipe = Equipe::get();
        return view('admin.equipe')->with('equipe',$equipe);
    }
    public function edits($id){

        $equipe = Equipe::find($id);

        return view('admin.edits-equipe')->with('equipe', $equipe);
    }
    public function update(Request $request, $id){
        
        $this->validate($request,[
                                    'nomPrenom'=>'required',
                                    'domaine'=>'required',
                                    'titre'=>'required',
                                    'detailPersonnel'=>'required',
                                    'equipeImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('equipeImages')) {

        // 1:get files name with ext
        $fileNaleWithExt= $request->file('equipeImages')->getClientOriginalName();
        // 2:get just files name 
        $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
        // 3:get just files extension
        $extension=$request->file('equipeImages')->getClientOriginalExtension();
        // 4 : file name to store
        $fileNameToStore=$fileName.'_'.time().'.'.$extension;
        // 5  uploder l'image
        $path=$request->file('equipeImages')->storeAs('public/equipeImages',
        $fileNameToStore);

        }

        else{
        $fileNameToStore='noimage.jpg';
        }
        $equipe = Equipe::find($id);

        $equipe -> nomPrenom = $request -> input('nomPrenom');
        $equipe -> domaine = $request -> input('domaine');
        $equipe -> titre = $request -> input('titre');
        $equipe -> detailPersonnel = $request -> input('detailPersonnel');
        $equipe->equipeImages=$fileNameToStore;
        $equipe -> status = 1;
        $equipe ->update();

        return redirect('equipe')->with('status','equipe modifier avec succès');
    }
    public function delete($id){

        $equipe = Equipe::find($id);


        if($equipe->equipeImages != 'noimage.png'){
            Storage::delete('public/storage/'.$equipe->equipeImages);
        }
        $equipe->delete();

        return redirect('equipe')->with('equipe',$equipe);
    }
    public function desactiver($id){

        $equipe= Equipe::find($id);

        $equipe->status=1;
        $equipe->update();

        return redirect('equipe')->with('equipe',$equipe);
    }

    public function activer($id){

        $equipe= Equipe::find($id);

        $equipe->status=0;
        $equipe->update();

        return redirect('equipe')->with('equipe',$equipe);
    }
}
