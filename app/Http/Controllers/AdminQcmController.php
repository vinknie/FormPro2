<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Qcm;
use App\Models\Formation;
use App\Models\Matiere;
use App\Models\Chapitre;
use App\Models\Files;

class AdminQcmController extends Controller
{
    public function index(){

        $matieres = Matiere::all();
        $formations = Formation::all();

        return view('admin.qcm', compact('matieres', 'formations'));       
    }

    public function getMatieres($id_formation)
    {

        $matieres = Matiere::where('id_formation', $id_formation)->pluck("nom", "id_matiere");
        return json_encode($matieres);
    }

    public function filterMatiereInQCM(Request $request)
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

        return view('admin.qcm', compact('matieres', 'formations'));
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

        return view('admin.qcm', compact('matieres', 'chapitres'));
    }
}
