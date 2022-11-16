<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Rules\IsValidPassword;

use App\Models\File;
use App\Models\User;
use App\Models\Qcm;
use App\Models\Formation;
use App\Models\Matiere;
use App\Models\Chapitre;

use App\Http\Livewire\Formations;


use Illuminate\Support\Facades\DB;


class AdminChapitreController extends Controller
{
    
    public function chapitre() 
    {
        $matieres = Matiere::all();
        $formations = Formation::all();
        
        
        
        return view('admin.chapitre',compact('matieres','formations'));

    }

    public function getMatieres($id_formation){

        $matieres = Matiere::where('id_formation',$id_formation)->pluck("nom","id_matiere");
        return json_encode($matieres);

    }

    public function createChapitre(Request $request){

       
        $chapitres=[];

        foreach($request->nomchapitre as $key => $value){
            array_push($chapitres,[
                'id_matiere' => $request->id_matiere,
                'nom' => $request->nomchapitre[$key],
                'description' => $request->description[$key],
            ]);
        }

        Chapitre::insert($chapitres);

        return redirect()->back();      

      }

    public function filterMatiere(Request $request){

        $query = Matiere::query();
        $formations = Formation::all();

        if($request->ajax()){
            if(empty($request->formation)){
                $matieres = $query->get();
            }
            else{
            $matieres= $query->where(['id_formation'=>$request->formation])->get();
            }
            return response()->json(['matieres'=>$matieres]);
        }
        $matieres= $query->get();
        
        return view('admin.chapitre',compact('matieres','formations'));

    }

    public function editMatiere($id_matiere)
    {
        $matieres= Matiere::find($id_matiere);
        $chapitres=DB::select('select id_chapitre, nom, description, id_matiere  from chapitre where id_matiere = '.$id_matiere);
        $chapitre= Chapitre::all();
    
        return view('admin.editchapitre' , compact('matieres','chapitres','chapitre'));
        
    }

    public function updateChapitre(Request $request){



        foreach($request->nomchapitre as $key => $value){
            if(isset($request->id_chapitre[$key])){
                $chapitres = Chapitre::find($request->id_chapitre[$key]);
            }else{
                $chapitres= new Chapitre();
            }
                $chapitres->id_matiere = $request->id_matiere;
                $chapitres->nom = $request->nomchapitre[$key];
                $chapitres->description = $request->description[$key];
                


            $chapitres->save();
        }


        return redirect()->route('admin.chapitre');
    }

    public function deleteChapitre($id_chapitre)
    {
        
        $deleteChapitre = Chapitre::find($id_chapitre)->delete();

        return redirect()->back();
    }
    

}
