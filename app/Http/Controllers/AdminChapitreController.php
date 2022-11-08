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
        $formations = Formation::all();
        return view('admin.chapitre', compact('formations'));
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
            ]);
        }

        Chapitre::insert($chapitres);

        return redirect()->back();      

      }


}
