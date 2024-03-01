<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Innovation;
use Illuminate\Support\Facades\Storage;

class InnovationController extends Controller
{
    //
    public function add(){
        return view('admin.ajouter-innovation');
    }
    public function save(Request $request){
        
        $this->validate($request,[
                                  'nomProjet'=>'required',
                                  'nomAuteur'=>'required',
                                  'prixDeRevenir'=>'required',
                                  'breveDescriptionInnov'=>'required',
                                  'completeDescriptionInnov'=>'required',
                                  'innovationImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('innovationImages')) {

            // 1:get files name with ext
            $fileNaleWithExt= $request->file('innovationImages')->getClientOriginalName();
            // 2:get just files name 
            $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
            // 3:get just files extension
            $extension=$request->file('innovationImages')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // 5  uploder l'image
            $path=$request->file('innovationImages')->storeAs('public/innovationImages',
            $fileNameToStore);

        }

        else{
            $fileNameToStore='noimage.jpg';
        }
        $innovation = new Innovation();

        $innovation -> nomProjet = $request -> input('nomProjet');
        $innovation -> nomAuteur = $request -> input('nomAuteur');
        $innovation -> prixDeRevenir = $request -> input('prixDeRevenir');
        $innovation -> breveDescriptionInnov = $request -> input('breveDescriptionInnov');
        $innovation -> completeDescriptionInnov = $request -> input('completeDescriptionInnov');
        $innovation->innovationImages=$fileNameToStore;
        $innovation -> status = 1;
        $innovation ->save();

        return redirect('ajouter-innovation')->with('status','Slider '.$innovation -> titres. ' enregistré avec succès');
    }
    public function innovation(){
            
        $innovation = Innovation::get();
        return view('admin.innovation')->with('innovation',$innovation);
    }
    
    public function edits($id){

        $innovation = Innovation::find($id);

        return view('admin.edits-innovation')->with('innovation', $innovation);
    }
    public function update(Request $request, $id){
        
        $this->validate($request,[
                                    'nomProjet'=>'required',
                                    'nomAuteur'=>'required',
                                    'prixDeRevenir'=>'required',
                                    'breveDescriptionInnov'=>'required',
                                    'completeDescriptionInnov'=>'required',
                                    'innovationImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('innovationImages')) {

        // 1:get files name with ext
        $fileNaleWithExt= $request->file('innovationImages')->getClientOriginalName();
        // 2:get just files name 
        $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
        // 3:get just files extension
        $extension=$request->file('innovationImages')->getClientOriginalExtension();
        // 4 : file name to store
        $fileNameToStore=$fileName.'_'.time().'.'.$extension;
        // 5  uploder l'image
        $path=$request->file('innovationImages')->storeAs('public/innovationImages',
        $fileNameToStore);

        }

        else{
        $fileNameToStore='noimage.jpg';
        }
        $innovation = Innovation::find($id);

        $innovation -> nomProjet = $request -> input('nomProjet');
        $innovation -> nomAuteur = $request -> input('nomAuteur');
        $innovation -> prixDeRevenir = $request -> input('prixDeRevenir');
        $innovation -> breveDescriptionInnov = $request -> input('breveDescriptionInnov');
        $innovation -> completeDescriptionInnov = $request -> input('completeDescriptionInnov');
        $innovation->innovationImages=$fileNameToStore;
        $innovation -> status = 1;
        $innovation ->update();

        return redirect('innovation')->with('status','Innovation modifier avec succès');
    }
    public function delete($id){

        $innovation = Innovation::find($id);


        if($innovation->innovationImages != 'noimage.png'){
            Storage::delete('public/storage/'.$innovation->innovationImages);
        }
        $innovation->delete();

        return redirect('innovation')->with('innovation',$innovation);
    }
    public function desactiver($id){

        $innovation= Innovation::find($id);

        $innovation->status=1;
        $innovation->update();

        return redirect('innovation')->with('innovation',$innovation);
    }

    public function activer($id){

        $innovation= Innovation::find($id);

        $innovation->status=0;
        $innovation->update();

        return redirect('innovation')->with('innovation',$innovation);
    }
}
