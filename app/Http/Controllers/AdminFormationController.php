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

use App\Http\Livewire\Formations;


use Illuminate\Support\Facades\DB;


class AdminFormationController extends Controller
{
    public function formation() 
    {
        return view('admin.formation');
    }

    private function formationSelectFormateur()
    {
        
        $selectformateur=DB::select('select id , CONCAT(nom, " ", prenom) AS nom_complet from utilisateurs where role = "formateur"');
        return $selectformateur ;
        
    }
    
    public function backOfficeFormation()
      {
        $getformations=Formation::all();
        
        
        $selectformateur=$this->formationSelectFormateur();
      
        return view('admin.formation', compact('selectformateur','getformations'));
      }

      public function createFormationMatiere(Request $request){

       
        $formation = new Formation();
        $formation->nom = $request->nomformation;
        $formation->date_debut = $request->date_debut;
        $formation->date_fin = $request->date_fin;
            
        $formation->save();
        $matieres=[];

        foreach($request->nommatiere as $key => $value){
            array_push($matieres,[
                'id_formation' => $formation->id_formation,
                'nom' => $request->nommatiere[$key],
                'id_utilisateurs' => $request->id_formateur[$key],
            ]);
        }

        Matiere::insert($matieres);

        return redirect()->back();      

      }

      public function editFormation($id_formation)
    {
        $getformation= Formation::find($id_formation);
        $getmatieres=DB::select('select id_matiere, nom, id_utilisateurs from matiere where id_formation = '.$id_formation);
    
        
        
        $selectformateur=$this->formationSelectFormateur();
        return view('admin.editformation' , compact('getformation','getmatieres','selectformateur'));
        
    }

    public function updateFormation(Request $request, $id_formation ){


        $getformation = Formation::find($id_formation);
        $getformation->nom = $request->nomformation;
        $getformation->date_debut = $request->date_debut;
        $getformation->date_fin = $request->date_fin;

        $getformation->save();

       

        foreach($request->nommatiere as $key => $value){
            if(isset($request->id_matiere[$key])){
                $matieres = Matiere::find($request->id_matiere[$key]);
            }else{
                $matieres= new Matiere();
            }
                $matieres->id_formation = $id_formation;
                $matieres->nom = $request->nommatiere[$key];
                $matieres->id_utilisateurs = $request->id_formateur[$key];

            $matieres->save();
        }


        return redirect()->route('admin.formation');
    }

    public function deleteFormation($id_formation)
    {
        
        $deleteformation = Formation::find($id_formation)->delete();

        return redirect()->route('admin.formation');
    }

    public function deleteMatiere($id_matiere)
    {
        
        $deleteMatiere = Matiere::find($id_matiere)->delete();

        return redirect()->back();
    }
    


    public function showMatiere($id_formation){

        $getmatieres=DB::select('select nom from matiere where id_formation = '.$id_formation);
        return $getmatieres;
    }




}
