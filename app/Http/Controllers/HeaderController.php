<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    //
    public function add(){
        return view('admin.ajouter-header');
    }
    public function save(Request $request){
        
        $this->validate($request,[
                                  'titres'=>'required',
                                  'description1'=>'required',
                                  'description2'=>'required',
                                  'headerImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('headerImages')) {

            // 1:get files name with ext
            $fileNaleWithExt= $request->file('headerImages')->getClientOriginalName();
            // 2:get just files name 
            $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
            // 3:get just files extension
            $extension=$request->file('headerImages')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // 5  uploder l'image
            $path=$request->file('headerImages')->storeAs('public/headerImages',
            $fileNameToStore);

        }

        else{
            $fileNameToStore='noimage.jpg';
        }
        $header = new Header();

        $header -> titres = $request -> input('titres');
        $header -> description1 = $request -> input('description1');
        $header -> description2 = $request -> input('description2');
        $header->headerImages=$fileNameToStore;
        $header -> status = 1;
        $header ->save();

        return redirect('ajouter-header')->with('status','Slider '.$header -> titres. ' enregistré avec succès');
    }
    public function header(){
            
        $header = Header::get();
        return view('admin.header')->with('header',$header);
    }
    public function edits($id){

        $header = Header::find($id);

        return view('admin.edits-header')->with('header', $header);
    }
    public function update(Request $request, $id){
        
        $this->validate($request,[
                                  'titres'=>'required',
                                  'description1'=>'required',
                                  'description2'=>'required',
                                  'headerImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('headerImages')) {

            // 1:get files name with ext
            $fileNaleWithExt= $request->file('headerImages')->getClientOriginalName();
            // 2:get just files name 
            $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
            // 3:get just files extension
            $extension=$request->file('headerImages')->getClientOriginalExtension();
            // 4 : file name to store 
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // 5  uploder l'image
            $path=$request->file('headerImages')->storeAs('public/headerImages',
            $fileNameToStore);

        }

        else{
            $fileNameToStore='noimage.jpg';
        }
        $header = Header::find($id);

        $header -> titres = $request -> input('titres');
        $header -> yydescription1 = $request -> input('description1');
        $header -> description2 = $request -> input('description2');
        $header->headerImages=$fileNameToStore;
        $header -> status = 1;
        $header ->update();

        return redirect('header')->with('status','Header '.$header -> titres.' a été modifié avec succès');
    }
    public function delete($id){

        $header = Header::find($id);


        if($header->headerImages != 'noimage.png'){
            Storage::delete('public/storage/'.$header->headerImages);
        }
        $header->delete();

        return redirect('header')->with('header',$header);
    }
    public function desactiver($id){

        $header= Header::find($id);

        $header->status=1;
        $header->update();

        return redirect('header')->with('header',$header);
    }

    public function activer($id){

        $header= Header::find($id);

        $header->status=0;
        $header->update();

        return redirect('header')->with('header',$header);
    }
}
