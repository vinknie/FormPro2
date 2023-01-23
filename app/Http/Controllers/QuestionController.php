<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Qcm;
use App\Models\Formation;
use App\Models\Matiere;
use App\Models\Chapitre;
use App\Models\Question;
use App\Models\Option;
use App\Models\Result;
use App\Models\Notes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class QuestionController extends Controller
{
    public function index(){

        $user = Auth::User();
        if($user){
            $role_user = User::find($user->id)->role;

            if($role_user == 'admin' || $role_user == 'secretaire'){
                $formations = Formation::all();

                return view('pages.question', compact('formations')); 
            }else if($role_user == 'apprenant'){
                $formationsUser=DB::table('utilisateurs')
                ->join('user_formation', 'user_formation.id_utilisateur' , '=' , 'utilisateurs.id')
                ->join('formation','formation.id_formation' , '=' ,'user_formation.id_formation')
                ->join('matiere','matiere.id_formation','=','formation.id_formation')
                ->select('utilisateurs.nom' ,'utilisateurs.id' , 'utilisateurs.prenom','utilisateurs.email','utilisateurs.role','utilisateurs.sexe','utilisateurs.telephone','formation.id_formation','formation.nom AS nomForm','formation.date_debut','formation.date_fin','matiere.nom AS nomMat','matiere.id_utilisateurs AS idUserMat','matiere.id_matiere','formation.id_formation','user_formation.id_utilisateur')
                ->where('utilisateurs.id' , '=' , $user->id)
                ->groupBy('formation.id_formation')
                ->get();
                
                return view('pages.question', compact('formationsUser')); 

        }
        }else{
            return redirect()->route('pages.login');
        }
    }

    public function getMatiereUser($id_formation)
    {
        $id_user  = Auth::user()->id;
        $role_user = User::find($id_user)->role;

        if($role_user == 'admin' || $role_user == 'secretaire'){
            $matieres = Matiere::where('id_formation', $id_formation)
            ->pluck("nom", "id_matiere");
            return json_encode($matieres);

        }else if($role_user == 'apprenant'){
            $matieres = Matiere::where('id_formation', $id_formation)
            ->pluck("nom", "id_matiere");
            return json_encode($matieres);
        }
    
    }
    
    public function filterChapiter(Request $request){
  
        $query=DB::table('chapitre')
        ->leftJoin('qcm','qcm.id_chapitre' , '=' ,'chapitre.id_chapitre')
        ->select('chapitre.id_chapitre','chapitre.nom','chapitre.description',DB::raw('group_concat(qcm.id_qcm) as IdQcm'),DB::raw('group_concat(qcm.titre) as TitreQcm'),'chapitre.id_matiere',DB::raw('group_concat(qcm.actif) as ActifQcm'))
        ->groupBy('chapitre.id_chapitre');
     
        if($request->ajax()){
            if(!empty($request->matiere)){
                $chapitres1= $query->where(['id_matiere'=>$request->matiere])->get();

            }
            return response()->json(['chapitre'=>$chapitres1]);
        }
        
        $chapitres= $query->get();
        
        return view('pages.qcm',compact('chapitres'));
    }

    public function viewQcm($id_qcm)
    {
        $data=Qcm::find($id_qcm);
        $qcm =DB::table('qcm')
        ->join('question','question.id_qcm','=','qcm.id_qcm')
        ->join('option','option.id_question','=','question.id_question')
        ->select('qcm.id_qcm','qcm.id_chapitre','qcm.titre','question.id_question','question.question','question.points','question.type',DB::raw('group_concat(option.option) as Option'),DB::raw('group_concat(option.id_option) as IdOption'))
        ->where('qcm.id_qcm','=', $data->id_qcm)
        ->groupBy('question.id_question')
        ->get();

     

        return view('pages.quizz',compact('data','qcm'));
    }

    public function submitQuizz(Request $request , $id_qcm){
        
        $qcm = Qcm::find($id_qcm);
        $score = 0;
        $correctAnswers = 0;
        $wrongAnswers = [];
        $answers = $request->input('answers');
        $id_user = auth()->user()->id;
        if(!$answers){
            $score = 0;

            $note = [
                'id_eleve' => $id_user,
                'id_chapitre' => $qcm->id_chapitre,
                'note' =>$score,
            ];
            Notes::insert($note);

            return redirect()->back()
                ->with('score', $score);
        }
        foreach($answers as $id_question => $answer){
            $question = Question::find($id_question);
            $options = Option::whereIn('id_option', $answers[$id_question])->get();
            $correctOptions = [];
            $results = [];              
            foreach($options as $option){
                if($option->correct){
                    $score += $question->points;
                    $correctAnswers++;
                    $result = [
                        'id_option' => $option->id_option,
                        'id_utilisateur' => $id_user
                    ];
                    $results[] = $result;
                }else{
                    $wrongAnswers[] = $option;
                }
            }
            if(!empty($results)){
                Result::insert($results);
            }
        }
        $note = [
            'id_eleve' => $id_user,
            'id_chapitre' => $qcm->id_chapitre,
            'note' =>$score,
        ];
        Notes::insert($note);
       

        return redirect()->back()
        ->with('correctAnswers', $correctAnswers )
        ->with('wrongAnswers', $wrongAnswers );
      
    }
    

}
