<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Rules\IsValidPassword;


use App\Models\User;
use App\Models\Qcm;
use App\Models\Formation;
use App\Models\Matiere;
use App\Models\Chapitre;
use App\Models\Files;

use App\Http\Livewire\Formations;


use Illuminate\Support\Facades\DB;

class ElearningUserController extends Controller
{
    public function cours() 
    {
        $matieres = Matiere::all();
        $formations = Formation::all();
        $chapitres = Chapitre::all(); 
        $files= Files::all();  
             
       
        
        return view('pages.cours',compact('matieres','formations','chapitres','files'));
    }

    public function getMatieres($id_formation){

        $matieres = Matiere::where('id_formation',$id_formation)->pluck("nom","id_matiere");
        return json_encode($matieres);

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
        
        return view('pages.cours',compact('matieres','formations'));

    }
    public function getChapitre($id_matiere){

        $chapitres = Chapitre::where('id_matiere',$id_matiere)->pluck("nom","id_chapitre");
        return json_encode($chapitres);

    }
    // public function getChapitre(){

    //     $chapitres = DB::table('chapitre')
    //     ->join('files','chapitre.id_chapitre' , '=' ,'files.id_chapitre')
    //     ->join('matiere','chapitre.id_chapitre','=','matiere.id_chapitre')
    //     ->select('chapitre.id_chapitre','chapitre.nom','chapitre.description','files.id','files.name','files.file','SUBSTRING_INDEX(file,'.',-1)' ,'matiere.id_matiere','chapitre.id_matiere'); 
    //     return json_encode($chapitres);

    // }

    public function filterChapitre(Request $request){

        
        $query=DB::table('chapitre')
        ->join('files','chapitre.id_chapitre' , '=' ,'files.id_chapitre')
        // ->join('matiere','chapitre.id_matiere', '=' , 'matiere.id_matiere')
        ->select('chapitre.id_chapitre','chapitre.nom','chapitre.description',DB::raw('group_concat(files.id) as IdFiles'),DB::raw('group_concat(files.name) as NameFiles'),DB::raw('group_concat(files.file) as FileFiles'),'chapitre.id_matiere')
        ->groupBy('chapitre.id_chapitre','chapitre.nom','chapitre.description','chapitre.id_matiere');
        
        $matieres = Matiere::all();
       
        // $query=Chapitre::query();
       

        if($request->ajax()){
            if(empty($request->matiere)){
                $chapitres = $query->get();
    
            }
            else{
            $chapitres= $query->where(['id_matiere'=>$request->matiere])->get();
           
            }
            return response()->json(['chapitre'=>$chapitres]);
        }
        
        $chapitres= $query->get();
        
       
        

        return view('pages.cours',compact('matieres','chapitres'));
    }

    
}
