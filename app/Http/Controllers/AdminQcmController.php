<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Qcm;
use App\Models\Question;
use App\Models\Option;
use App\Models\Formation;
use App\Models\Matiere;
use App\Models\Chapitre;
use App\Models\Files;
use Mockery\Undefined;

use App\Imports\QcmImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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

    
        $question = new Question();
        $question->id_qcm = $request->id_qcm;
        $question->question = $request->question;
        $question->points = $request->points;
        $question->type = $request->type;
            
        $question->save();

        // $createOption = [];
     
        // foreach($request->option as $key => $value){
        // //    dump(in_array($request->option[$key],$request->input('correct')));
        //     array_push($createOption,[
        //         'id_question' => $question['id_question'],
        //         'option' => $request->option[$key],
                
        //         'correct' => $value('correct') ? 1 : 0,  // Check la value dans les 2 tableaux 
        //     ]); 


        //  }
        foreach($request->option as $key => $value){
            $options = New Option();
            $options->id_question = $question->id_question;
            $options->option = $request->option[$key];
            $options ->correct = $request->correct[$key];

            $options->save();
        }

        

        //  $checkboxes = $_POST['checkbox'];
        //  $check_arr = [];
        // //  loopoing through checkboxes
        // foreach($checkboxes as $checkbox) {
        //     if(isset($checkbox)) {
        //         array_push($check_arr, 1);
        //     }else {
        //         array_push($check_arr, 0);
        //     }
        // }
        //  dump($createOption);
        
        // Option::insert($createOption);

        return redirect()->back()->with('success', 'La Question a  bien été créé'); 

    }

    public function index3(){

        return view('admin.QCM.import');       
    }



    public function import(Request $request){
        $this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();
        // $data = Excel::load($path, function($reader) {})->get();
        $data = Excel::import(new QcmImport, $path);
        // return back()->with('success', 'Excel Data Importé avec success.');
    }


    public function viewQcm(){
        // $matieres = Matiere::all();
        $user= Auth::User();
        if($user){
            
            $role_user = User::find($user->id)->role;
            
            if($role_user == 'admin' ||$role_user == 'secretaire'){
                $formations = Formation::all(); // Admin ; secretaire
                
                return view('admin.QCM.viewQcm', compact('formations')); 
            }else if($role_user == 'formateur'){
                $formationFormateur=DB::table('utilisateurs')
                ->join('matiere', 'matiere.id_utilisateurs' , '=' , 'utilisateurs.id')
                ->join('formation','formation.id_formation' , '=' ,'matiere.id_formation')
                ->select('utilisateurs.nom' ,'utilisateurs.id' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone','formation.id_formation','formation.nom AS nomForm','formation.date_debut','formation.date_fin','matiere.nom AS nomMat','matiere.id_utilisateurs AS idUserMat','matiere.id_matiere','formation.id_formation')
                ->where('utilisateurs.id' , '=' , $user->id)
                ->groupBy('formation.id_formation')
                ->get();
                
                return view('admin.QCM.viewQcm', compact('formationFormateur')); 
            }
        }else{
            return redirect()->route('pages.login');
        }
 
        
    }

    public function getMatieresFormateur($id_formation)
    {
        $id_user  = Auth::user()->id;
        $role_user = User::find($id_user)->role;

        if($role_user == 'admin' || $role_user == 'secretaire'){
            $matieres = Matiere::where('id_formation', $id_formation)
            ->pluck("nom", "id_matiere");
            return json_encode($matieres);

        }else if($role_user == 'formateur'){
            $matieres = Matiere::where('id_formation', $id_formation)
            ->where('id_utilisateurs', $id_user)
            ->pluck("nom", "id_matiere");
            return json_encode($matieres);
        }
    

        // $matieres = Matiere::where('id_formation', $id_formation)
        // ->where('id_utilisateurs', $id_user)
        // ->pluck("nom", "id_matiere");
        // return json_encode($matieres);
    }

    public function filterMatiereView(Request $request)
    {

        $query = DB::table('qcm')
        ->Join('chapitre' , 'qcm.id_chapitre','=','chapitre.id_chapitre')
        ->Join('matiere','chapitre.id_matiere','=','matiere.id_matiere')
        ->select('qcm.id_qcm','qcm.titre','chapitre.id_chapitre','chapitre.nom','matiere.*','qcm.actif')
        ->groupBy('qcm.id_qcm');
 
        if ($request->ajax()) {
            if (empty($request->matiere)) {
                $qcm = $query->get();
            } else {
                $qcm = $query->where(['matiere.id_matiere' => $request->matiere])->get();
            }
            return response()->json(['qcm' => $qcm]);
        }
        $qcm = $query->get();

        return view('admin.QCM.viewQCM', compact('chapitre', 'qcm'));
    }
    public function editQcm($id_qcm){

        $getQcm = Qcm::find($id_qcm);
    

        return view('admin.QCM.editQcm' , compact('getQcm'));

    }
    public function updateQcm(Request $request, $id_qcm){
        
    $getQcm = Qcm::find($id_qcm);
    $getQcm->titre = $request->titre;

    $getQcm->save();

    return redirect()->back()->with('success', 'Le Qcm a bien été Modifié');
    
    }

    public function viewQuestion(){
        $user= Auth::User();
        if($user){
            
            $role_user = User::find($user->id)->role;
            
            if($role_user == 'admin' ||$role_user == 'secretaire'){
                $formations = Formation::all(); // Admin ; secretaire
                
                return view('admin.QCM.viewQuestion', compact('formations')); 
            }else if($role_user == 'formateur'){
                $formationFormateur=DB::table('utilisateurs')
                ->join('matiere', 'matiere.id_utilisateurs' , '=' , 'utilisateurs.id')
                ->join('formation','formation.id_formation' , '=' ,'matiere.id_formation')
                ->select('utilisateurs.nom' ,'utilisateurs.id' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone','formation.id_formation','formation.nom AS nomForm','formation.date_debut','formation.date_fin','matiere.nom AS nomMat','matiere.id_utilisateurs AS idUserMat','matiere.id_matiere','formation.id_formation')
                ->where('utilisateurs.id' , '=' , $user->id)
                ->groupBy('formation.id_formation')
                ->get();
                
                return view('admin.QCM.viewQuestion', compact('formationFormateur')); 
            }
        }else{
            return redirect()->route('pages.login');
        }
    }

    public function showQuestion(Request $request)
    {

        $query = DB::table('qcm')
        ->Join('chapitre' , 'qcm.id_chapitre','=','chapitre.id_chapitre')
        ->Join('matiere','chapitre.id_matiere','=','matiere.id_matiere')
        ->Join('question','qcm.id_qcm','=','question.id_qcm')
        ->select('qcm.id_qcm','qcm.titre','chapitre.id_chapitre','chapitre.nom','matiere.*','question.question','question.type','question.id_question')
        ->groupBy('question.id_question');
 
        if ($request->ajax()) {
            if (empty($request->matiere)) {
                $question = $query->get();
            } else {
                $question = $query->where(['matiere.id_matiere' => $request->matiere])->get();
            }
            return response()->json(['question' => $question]);
        }
        $question = $query->get();

        return view('admin.QCM.viewQuestion', compact('question'));
    }
  


    public function editQuestion($id_question){

        $getQuest = Question::find($id_question);
        $getOption = DB::select('select id_option , id_question,option , correct from option where id_question = '.$id_question);

        return view('admin.QCM.editQuestion' , compact('getQuest','getOption'));

    }

    public function updateQuestion(Request $request, $id_question){
        
        $getQuest = Question::find($id_question);
        $getQuest->question = $request->question;
        $getQuest->points = $request->points;

        $getQuest->save();

    
        return redirect()->back()->with('successQuestion', 'La Question a bien été Modifié');
        
    }

    public function updateOption(Request $request)
    {

        
    
        foreach($request->option as $key => $value){
            if(isset($request->id_option[$key])){
                $option = Option::find($request->id_option[$key]);
            }else{
                $option = new Option();
            }
            $option->id_question = $request->id_question;
            $option->option = $request->option[$key];
            $option->correct = $request->correct[$key];

            $option->save();
        }
        return redirect()->back()->with('successOption', 'Les Options ont bien été Modifié');
    }

    public function deleteQcm($id_qcm)
    {
        
        $deleteQcm = Qcm::find($id_qcm)->delete();

        return redirect()->back();
    }

    public function changeActif($id_qcm){

        $actif = Qcm::find($id_qcm);

        if($actif->actif == 0){
            $actif->update(['actif' => 1]);
        }else{
            $actif->update(['actif' => 0]);
        }

        $actif->save();
        return redirect()->back()->with('actif', 'Status du Qcm Changé');
    }


}
