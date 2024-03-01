<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Slider;


class SlidersController extends Controller
{
    //

    
    public function add(){
        return view('admin.ajouter-sliders');
    }
    public function save(Request $request){
        
        $this->validate($request,[
                                  'titres'=>'required',
                                  'description1'=>'required',
                                  'description2'=>'required',
                                  'slidersImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('slidersImages')) {

            // 1:get files name with ext
            $fileNaleWithExt= $request->file('slidersImages')->getClientOriginalName();
            // 2:get just files name 
            $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
            // 3:get just files extension
            $extension=$request->file('slidersImages')->getClientOriginalExtension();
            // 4 : file name to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // 5  uploder l'image
            $path=$request->file('slidersImages')->storeAs('public/slidersImages',
            $fileNameToStore);

        }

        else{
            $fileNameToStore='noimage.jpg';
        }
        $sliders = new Slider();

        $sliders -> titres = $request -> input('titres');
        $sliders -> description1 = $request -> input('description1');
        $sliders -> description2 = $request -> input('description2');
        $sliders->slidersImages=$fileNameToStore;
        $sliders -> status = 1;
        $sliders ->save();

        return redirect('ajouter-sliders')->with('status','Slider '.$sliders -> titres. ' enregistré avec succès');
    }
    public function sliders(){
            
        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders',$sliders);
    }
    public function edits($id){

        $sliders = Slider::find($id);

        return view('admin.edits-sliders')->with('sliders', $sliders);
    }
    public function update(Request $request, $id){
        
        $this->validate($request,[
                                  'titres'=>'required',
                                  'description1'=>'required',
                                  'description2'=>'required',
                                  'slidersImages'=>'image|nullable|max:400'
                                ]);
        if($request->hasFile('slidersImages')) {

            // 1:get files name with ext
            $fileNaleWithExt= $request->file('slidersImages')->getClientOriginalName();
            // 2:get just files name 
            $fileName= pathinfo($fileNaleWithExt,PATHINFO_FILENAME);
            // 3:get just files extension
            $extension=$request->file('slidersImages')->getClientOriginalExtension();
            // 4 : file name to store 
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // 5  uploder l'image
            $path=$request->file('slidersImages')->storeAs('public/slidersImages',
            $fileNameToStore);

        }

        else{
            $fileNameToStore='noimage.jpg';
        }
        $sliders = Slider::find($id);

        $sliders -> titres = $request -> input('titres');
        $sliders -> description1 = $request -> input('description1');
        $sliders -> description2 = $request -> input('description2');
        $sliders->slidersImages=$fileNameToStore;
        $sliders -> status = 1;
        $sliders ->update();

        return redirect('sliders')->with('status','Slider '.$sliders -> titres. ' a été modifié avec succès');
    }
    public function delete($id){

        $sliders = Slider::find($id);


        if($sliders->slidersImages != 'noimage.png'){
            Storage::delete('public/storage/'.$sliders->slidersImages);
        }
        $sliders->delete();

        return redirect('sliders')->with('sliders',$sliders);
    }
    public function desactiver($id){

        $sliders= Slider::find($id);

        $sliders->status=1;
        $sliders->update();

        return redirect('sliders')->with('sliders',$sliders);
    }

    public function activer($id){

        $sliders= Slider::find($id);

        $sliders->status=0;
        $sliders->update();

        return redirect('sliders')->with('sliders',$sliders);
    }
}
