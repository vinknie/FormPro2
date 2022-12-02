<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Formation;
use App\Models\userFormation;
use App\Models\Matiere;

class AdminFormateurController extends Controller
{
    public function index(){


        $matieres = Matiere::all();
        $formations = Formation::all();

        $data = DB::table('utilisateurs')
        ->leftJoin('matiere', 'matiere.id_utilisateurs' , '=' , 'utilisateurs.id')
        ->leftJoin('formation','formation.id_formation' , '=' ,'matiere.id_formation')
        ->select('utilisateurs.nom' ,'utilisateurs.id' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone',DB::raw('group_concat(formation.id_formation) AS idForm'),DB::raw('group_concat(formation.nom) AS nomForm'),DB::raw('group_concat(formation.date_debut , " / " , formation.date_fin) as dateForm'))
        ->groupBy('utilisateurs.id')
        ->where('utilisateurs.role' , '=' , 'formateur')
        ->get();


        
   
 
        
        return view('admin.userFormateur', compact('data','matieres','formations'));
    }

    public function advance(Request $request){
        $data = DB::table('utilisateurs')
        ->leftJoin('matiere', 'matiere.id_utilisateurs' , '=' , 'utilisateurs.id')
        ->leftJoin('formation','formation.id_formation' , '=' ,'matiere.id_formation')
        ->select('utilisateurs.nom' ,'utilisateurs.id' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone',DB::raw('group_concat(formation.id_formation) AS idForm'),DB::raw('group_concat(formation.nom) AS nomForm'),DB::raw('group_concat(formation.date_debut , " / " , formation.date_fin) as dateForm'))
        ->groupBy('utilisateurs.id')
        ->where('utilisateurs.role' , '=' , 'formateur');

        if($request->nom){
            $data = $data->where('utilisateurs.nom', 'LIKE', "%" . $request->nom . "%");
        }
        if($request->prenom){
            $data = $data->where('utilisateurs.prenom', 'LIKE', "%" . $request->prenom . "%");
        }
        if($request->email){
            $data = $data->where('utilisateurs.email', 'LIKE', "%" . $request->email . "%");
        }
        if($request->sexe){
            $data = $data->where('utilisateurs.sexe', 'LIKE', "%" . $request->sexe . "%");
        }
        if($request->nomForm){
            $data = $data->where('formation.nom', 'LIKE', "%" . $request->nomForm . "%");
        } 
        if($request->dateForm){
            $data = $data->where('formation.date_debut', 'LIKE', "%" . $request->dateForm . "%");
        }

        $data = $data->paginate(5);
        return view('admin.userFormateur', compact('data'));
    }

    public function editFormateur($id)
    {
        $formations=Formation::all();

        $getUser= User::find($id);
        $FormationMatiere=DB::table('utilisateurs')
        ->join('matiere', 'matiere.id_utilisateurs' , '=' , 'utilisateurs.id')
        ->join('formation','formation.id_formation' , '=' ,'matiere.id_formation')
        ->select('utilisateurs.nom' ,'utilisateurs.id' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone','formation.nom AS nomForm','formation.date_debut','formation.date_fin','matiere.nom AS nomMat','matiere.id_utilisateurs AS idUserMat','matiere.id_matiere')
        ->where('utilisateurs.id' , '=' , $getUser->id)
        ->get();

        return view('admin.editFormateur' , compact('getUser','FormationMatiere','formations'));
        
    }
    public function updateFormateur(Request $request, $id)
    { 
        $request->validate([
            'email' => 'unique:utilisateurs,email,'.$request->id,
            // 'id_formation' =>'unique:user_formation,id_formation',

        ], 
        [
            'email.unique' => 'Email deja utilisé',
            // 'id_formation.unique' => 'Deja dans la formation',
        ]);


        $getUser= User::find($id);
        
        $getUser->telephone = $request->telephone;
        $getUser->adresse = $request->adresse;
        $getUser->complementAdresse = $request->complementAdresse;
        $getUser->ville = $request->ville;
        $getUser->codePostal = $request->codePostal;
        $getUser->pays = $request->pays;
        $getUser->niveau = $request->niveau;
        $getUser->status = $request->status;
        $getUser->email = $request->email;
        
        $getUser->save();
        return redirect()->route('admin.userFormateur');
    }

    public function deleteMatiereFormateur($id_utilisateurs,$id_matiere)
    {
      

        $idUserMatiere = Matiere::where('id_utilisateurs',$id_utilisateurs)->where('id_matiere',$id_matiere)->first();

        $idUserMatiere->id_utilisateurs = null;
            
        $idUserMatiere->save();

        

        return redirect()->back();
    }

    public function deleteFormateur($id)
    {
        $delete = User::where('id',$id)->delete();
        return redirect()->back();
    }

    public function getMatieres($id_formation){

        $matieres = Matiere::where('id_formation',$id_formation)->pluck("nom","id_matiere");
        return json_encode($matieres);

    }

    public function addMatiere(Request $request,$id)
    {
        $getUser= User::find($id);

        $test = Matiere::where('id_matiere',$request->id_matiere)->where('id_utilisateurs',null)->first();
        if($test){
             $test->id_utilisateurs = $getUser->id;
            $test->save();
            return redirect()->back();
        }else{
            return redirect()->back()->with('fail', 'Deja un Formateur dans cette matiere');
        }
    }
}
