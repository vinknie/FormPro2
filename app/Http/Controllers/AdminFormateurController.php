<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFormateurController extends Controller
{
    public function index(){
        $data = DB::table('utilisateurs')
        ->leftJoin('matiere', 'matiere.id_utilisateurs' , '=' , 'utilisateurs.id')
        ->leftJoin('formation','formation.id_formation' , '=' ,'matiere.id_formation')
        ->select('utilisateurs.nom' ,'utilisateurs.id' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone',DB::raw('group_concat(formation.id_formation) AS idForm'),DB::raw('group_concat(formation.nom) AS nomForm'),DB::raw('group_concat(formation.date_debut , " / " , formation.date_fin) as dateForm'))
        ->groupBy('utilisateurs.id')
        ->where('utilisateurs.role' , '=' , 'formateur')
        ->get();


        
   
 
        
        return view('admin.userFormateur', compact('data'));
    }

    // public function advance(Request $request){
    //     $data = DB::table('utilisateurs')
    //     ->leftJoin('user_formation','utilisateurs.id' , '=' ,'user_formation.id_utilisateur')
    //     ->leftJoin('formation','formation.id_formation' , '=' ,'user_formation.id_formation')
    //     ->select('utilisateurs.nom' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone',DB::raw('group_concat(formation.date_debut , " " , formation.date_fin) as dateForm'),DB::raw('group_concat(formation.nom) as nomForm'))
    //     ->groupBy('utilisateurs.nom' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone')
    //     ->where('utilisateurs.role' , '=' , 'formateur');

    //     if($request->nom){
    //         $data = $data->where('utilisateurs.nom', 'LIKE', "%" . $request->nom . "%");
    //     }
    //     if($request->prenom){
    //         $data = $data->where('utilisateurs.prenom', 'LIKE', "%" . $request->prenom . "%");
    //     }
    //     if($request->email){
    //         $data = $data->where('utilisateurs.email', 'LIKE', "%" . $request->email . "%");
    //     }
    //     if($request->sexe){
    //         $data = $data->where('utilisateurs.sexe', 'LIKE', "%" . $request->sexe . "%");
    //     }
    //     if($request->nomForm){
    //         $data = $data->where('formation.nom', 'LIKE', "%" . $request->nomForm . "%");
    //     } 
    //     if($request->dateForm){
    //         $data = $data->where('formation.date_debut', 'LIKE', "%" . $request->dateForm . "%");
    //     }

    //     $data = $data->paginate(10);
    //     return view('admin.userFormateur', compact('data'));
    // }
}
