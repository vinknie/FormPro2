<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

use App\Models\User;
use App\Models\Formation;
use App\Models\userFormation;

class AdminApprenantController extends Controller
{
    public function index(Request $request){
       
        $data = DB::table('utilisateurs')
        ->leftJoin('user_formation','utilisateurs.id' , '=' ,'user_formation.id_utilisateur')
        ->leftJoin('formation','formation.id_formation' , '=' ,'user_formation.id_formation')
        ->select('utilisateurs.id','utilisateurs.nom' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone',DB::raw('group_concat(formation.date_debut , " / " , formation.date_fin) as dateForm'),DB::raw('group_concat(formation.nom) as nomForm'))
        ->groupBy('utilisateurs.id')
        ->where('utilisateurs.role' , '=' , 'apprenant')
        ->paginate(5);

        
    
        return view('admin.userApprenant', compact('data'));
    }
   

    public function advance(Request $request){
        $data = DB::table('utilisateurs')
        ->leftJoin('user_formation','utilisateurs.id' , '=' ,'user_formation.id_utilisateur')
        ->leftJoin('formation','formation.id_formation' , '=' ,'user_formation.id_formation')
        ->select('utilisateurs.id','utilisateurs.nom' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone',DB::raw('group_concat(formation.date_debut , " " , formation.date_fin) as dateForm'),DB::raw('group_concat(formation.nom) as nomForm'))
        ->groupBy('utilisateurs.id')
        ->where('utilisateurs.role' , '=' , 'apprenant');

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
        return view('admin.userApprenant', compact('data'));
    }

    public function editApprenant($id)
    {
        $formations=Formation::all();

        $getUser= User::find($id);
        $userFormation=DB::table('utilisateurs')
        ->join('user_formation','utilisateurs.id', '=' , 'user_formation.id_utilisateur')
        ->join('formation' ,'formation.id_formation', '=' , 'user_formation.id_formation')
        ->select('formation.nom AS FormNom','formation.date_debut','formation.date_fin','user_formation.id_utilisateur', 'user_formation.id_formation','utilisateurs.id')
        ->where('user_formation.id_utilisateur' ,'=', $getUser->id) 
        ->get();

        return view('admin.editApprenant' , compact('getUser','userFormation','formations'));
        
    }

    public function updateApprenant(Request $request, $id)
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
        
      

        if($request->id_formation){
            // $userFormation= new UserFormation([
            //         'id_formation'=>$request->id_formation,
            //         'id_utilisateur'=>$getUser->id,
            //     ]); 
            //     $userFormation->save();
               $userForm = UserFormation::firstOrCreate([
                            'id_formation'=>$request->id_formation,
                            'id_utilisateur'=>$getUser->id,
                ]);
                if($userForm->wasRecentlyCreated){
                    // echo 'test';
                    return redirect()->route('admin.userApprenant');
                }else{
                    return back()->with('error','Deja dans la formation');
                }
            }

        $getUser->save();
        return redirect()->route('admin.userApprenant');

        
    }

    
    public function deleteUserFormation($id_formation,$id_utilisateur)
    {
        
        $delete = UserFormation::where('id_utilisateur', $id_utilisateur )->where('id_formation',$id_formation)->delete();

        return redirect()->back();
    }

    public function deleteApprenant($id)
    {
        $delete = User::where('id',$id)->delete();
        return redirect()->back();
    }

    // Function pour les PDF   

    public function PdfEntree($id,$id_formation){

        
        $getformation=Formation::find($id_formation);
        $getUser= User::find($id);
        $userFormation=DB::table('utilisateurs')
        ->join('user_formation','utilisateurs.id', '=' , 'user_formation.id_utilisateur')
        ->join('formation' ,'formation.id_formation', '=' , 'user_formation.id_formation')
        ->select('formation.nom AS FormNom','formation.date_debut','formation.date_fin','user_formation.id_utilisateur', 'user_formation.id_formation')
        ->where('user_formation.id_utilisateur' ,'=', $getUser->id) 
        ->where('user_formation.id_formation','=', $getformation->id_formation)
        ->get();

        $pdf = PDF::loadView('admin.PDF.attestationEntree', compact('userFormation','getUser','getformation'))->output();
        return response()->streamDownload(
            fn ()=> print($pdf),
            "Attestion_d'entrée_".$userFormation[0]->FormNom."_"."$getUser->nom"."_"."$getUser->prenom".".pdf"
        );
        // return view('admin.PDF.attestationEntree',compact('userFormation','getUser','getformation'));
    }
    public function PdfFin($id,$id_formation){

        
        $getformation=Formation::find($id_formation);
        $getUser= User::find($id);
        $userFormation=DB::table('utilisateurs')
        ->join('user_formation','utilisateurs.id', '=' , 'user_formation.id_utilisateur')
        ->join('formation' ,'formation.id_formation', '=' , 'user_formation.id_formation')
        ->select('formation.nom AS FormNom','formation.date_debut','formation.date_fin','user_formation.id_utilisateur', 'user_formation.id_formation')
        ->where('user_formation.id_utilisateur' ,'=', $getUser->id) 
        ->where('user_formation.id_formation','=', $getformation->id_formation)
        ->get();

         $pdf = PDF::loadView('admin.PDF.attestationFin', compact('userFormation','getUser','getformation'))->output();
            return response()->streamDownload(
             fn ()=> print($pdf),
             "Attestion_de_fin_".$userFormation[0]->FormNom."_"."$getUser->nom"."_"."$getUser->prenom".".pdf"
        );
        // return view('admin.PDF.attestationFin',compact('userFormation','getUser','getformation'));
    }
    public function contratFormation($id,$id_formation){

        
        $getformation=Formation::find($id_formation);
        $getUser= User::find($id);
        $userFormation=DB::table('utilisateurs')
        ->join('user_formation','utilisateurs.id', '=' , 'user_formation.id_utilisateur')
        ->join('formation' ,'formation.id_formation', '=' , 'user_formation.id_formation')
        ->select('formation.nom AS FormNom','formation.date_debut','formation.date_fin','user_formation.id_utilisateur', 'user_formation.id_formation')
        ->where('user_formation.id_utilisateur' ,'=', $getUser->id) 
        ->where('user_formation.id_formation','=', $getformation->id_formation)
        ->get();

         $pdf = PDF::loadView('admin.PDF.contratFormation', compact('userFormation','getUser','getformation'))->output();
            return response()->streamDownload(
             fn ()=> print($pdf),
             "Attestion_de_fin_".$userFormation[0]->FormNom."_"."$getUser->nom"."_"."$getUser->prenom".".pdf"
        );
        // return view('admin.PDF.contratFormation',compact('userFormation','getUser','getformation'));
    }

    public function conventionFormation($id,$id_formation){

        
        $getformation=Formation::find($id_formation);
        $getUser= User::find($id);
        $userFormation=DB::table('utilisateurs')
        ->join('user_formation','utilisateurs.id', '=' , 'user_formation.id_utilisateur')
        ->join('formation' ,'formation.id_formation', '=' , 'user_formation.id_formation')
        ->select('formation.nom AS FormNom','formation.date_debut','formation.date_fin','user_formation.id_utilisateur', 'user_formation.id_formation')
        ->where('user_formation.id_utilisateur' ,'=', $getUser->id) 
        ->where('user_formation.id_formation','=', $getformation->id_formation)
        ->get();

        //  $pdf = PDF::loadView('admin.PDF.conventionFormation', compact('userFormation','getUser','getformation'))->output();
        //     return response()->streamDownload(
        //      fn ()=> print($pdf),
        //      "Attestion_de_fin_".$userFormation[0]->FormNom."_"."$getUser->nom"."_"."$getUser->prenom".".pdf"
        // );
        return view('admin.PDF.conventionFormation',compact('userFormation','getUser','getformation'));
    }

    
}
