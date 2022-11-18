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
use Symfony\Component\VarDumper\VarDumper;

class AdminFichierController extends Controller
{
    public function fichierview()
    {
        $matieres = Matiere::all();
        $formations = Formation::all();



        return view('admin.fichier', compact('matieres', 'formations'));
    }

    public function getMatieres($id_formation)
    {

        $matieres = Matiere::where('id_formation', $id_formation)->pluck("nom", "id_matiere");
        return json_encode($matieres);
    }

    public function filterMatiereInFile(Request $request)
    {

        $query = Matiere::query();
        $formations = Formation::all();

        if ($request->ajax()) {
            if (empty($request->formation)) {
                $matieres = $query->get();
            } else {
                $matieres = $query->where(['id_formation' => $request->formation])->get();
            }
            return response()->json(['matieres' => $matieres]);
        }
        $matieres = $query->get();

        return view('admin.fichier', compact('matieres', 'formations'));
    }

    public function getChapitre($id_matiere)
    {

        $chapitres = Chapitre::where('id_matiere', $id_matiere)->pluck("nom", "id_chapitre");
        return json_encode($chapitres);
    }

    public function filterChapitre(Request $request)
    {

        $query = Chapitre::query();
        $matieres = Matiere::all();

        if ($request->ajax()) {
            if (empty($request->matiere)) {
                $chapitres = $query->get();
            } else {
                $chapitres = $query->where(['id_matiere' => $request->matiere])->get();
            }
            return response()->json(['chapitre' => $chapitres]);
        }
        $chapitres = $query->get();

        return view('admin.fichier', compact('matieres', 'chapitres'));
    }


    public function createFichier(Request $request)
    {

        // $filename=time().'.'.$request->nomfichier[$key]->getClientOriginalExtension();

        // $request->file->move('assets',$filename);

        $files = [];

        foreach ($request->nomfichier as $key => $value) {
            $filename = $request->file[$key]->getClientOriginalName();
            array_push($files, [

                'name' => $request->nomfichier[$key],
                'description' => $request->description[$key],
                'file' =>  $filename[$key],
                'extension' => pathinfo($filename)['extension'],
                'id_formation' => $request->id_formation[$key],
                'id_chapitre' => $request->id_chapitre[$key],
                $request->file[$key]->move('assets', $filename),
            
            ]);
        }

        // $filestoinsert = array_pop($files);

        echo '<pre>';
        var_dump($files);
        echo '</pre>';

        die();


        Files::insert($files);
        return redirect()->back();
    }

}
