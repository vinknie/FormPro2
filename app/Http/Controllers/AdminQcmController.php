<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Qcm;
use App\Models\Question;
use App\Models\Formation;
use App\Models\Matiere;
use App\Models\Chapitre;
use App\Models\Files;

class AdminQcmController extends Controller
{
    public function index(){

        $matieres = Matiere::all();
        $formations = Formation::all();

        return view('admin.QCM.createQcm', compact('matieres', 'formations'));       
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

        return view('admin.QCM.createQcm', compact('matieres', 'formations'));
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

        return view('admin.QCM.createQcm', compact('matieres', 'chapitres'));
    }


    public function createQcm(Request $request){

        $qcm = [];

        foreach ($request->titre as $key => $value){
            array_push($qcm,[
                'id_chapitre'=>$request->id_chapitre[$key],
                'titre'=>$request->titre[$key],

            ]);
        }

        Qcm::insert($qcm);

        return redirect()->back()->with('success', 'Le Qcm a bien été créer'); 

    }


    public function index2(){

        $matieres = Matiere::all();
        $formations = Formation::all();

        return view('admin.QCM.createQuestion', compact('matieres', 'formations'));       
    }

    public function getQcm($id_chapitre)
    {

        $qcm = Qcm::where('id_chapitre', $id_chapitre)->pluck("titre", "id_qcm");
        return json_encode($qcm);
    }

    public function filterQcm(Request $request)
    {

        $query = Qcm::query();
        $chapitres = Chapitre::all();

        if ($request->ajax()) {
            if (empty($request->chapitre)) {
                $qcm = $query->get();
            } else {
                $qcm = $query->where(['id_chapitre' => $request->chapitre])->get();
            }
            return response()->json(['qcm' => $qcm]);
        }
        $qcm = $query->get();

        return view('admin.QCM.createQuestion', compact('chapitres', 'qcm'));
    }


    public function createQuestion(Request $request){

        $question = [];

        foreach ($request->question as $key => $value){
            array_push($question,[
            
                'id_qcm'=>$request->id_qcm[$key],
                'question'=>$request->question[$key],
                'points'=>$request->points[$key],
                'type'=>$request->type[$key],

            ]);
        }

        Question::insert($question);

        $option = [];

        foreach($request->option as $key => $value){
            array_push($option,[
                'id_question' => $question['id_question'],
                'option' => $request->option[$key],
                'correct' => $request->correct[$key],
            ]);
        }

        return redirect()->back()->with('success', 'La Question a  bien été créé'); 

    }
}
