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

class PagesController extends Controller
{
    /* function Accueil */
    public function index() 
    {
        return view('pages.accueil');
    }
    

    /* function uploadfile*/
    public function uploadfile(Request $request)
    {

        $data=new file();

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('assets',$filename);

        $data->file=$filename;

        $data->name=$request->name;
        $data->description=$request->description;
        $data->extension=$request->extension;

        $data->save();
        return redirect()->back();



    }

    /* function elearning */
    public function elearning()
    {
        return view('pages.elearning');
    }

        /* function vue et download des fichiers */
    public function cours()
    {
        $data=DB::select('select * from files where extension = "PDF"');
        return view('pages.cours',compact('data'));
    }
    public function download(Request $request,$file)
    {
        return response()->download(public_path('assets/'.$file));
    }  

    public function view($id)
    {
        $data=File::find($id);

        return view('.pages.viewfile',compact('data'));
    }

        /* function vue et download des fichiers MP4 */
    public function video()
    {
        $data=DB::select('select * from files where extension = "MP4"');
        return view('.pages.video',compact('data'));
    }
    public function live()
    {
        return view('pages.live');
    }

    /* Function Register */
    public function register()
    {
       
        return view('pages/register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'status' => 'required',
            'role' => 'required',
            'email' => 'required|unique:utilisateurs',
            'username' => 'required|unique:utilisateurs',
            'password' => ['required', 'string', 'confirmed', new isValidPassword()],
            'password_confirmation' => 'required|same:password',

        ]);
        $user = new User([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'status' => $request->status,
            'role' => $request->role,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            
        ]);
        $user->save();
        return redirect()->route('pages.login')->with('success','Registration Success. Please Login!');
    }

    /* Function Login */
    public function login()
    {
       
        return view('pages.login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            

        ]);
       if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/');
       }
        return back()->withErrors(['password'=>'Mauvais Nom de compte ou mauvais mot de passe!']);
    }

    /* Function Logout */

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }

    /* function Profil */
    public function profil()
    {
        return view('pages.profil');
    }
    /* function Profil */
    public function satisfaction()
    {
        return view('pages.satisfaction');
    }


    /* function QCM */ 

    public function create_qcm(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'reponse1' => 'required',
            'reponse2' => 'required',
            'reponse3' => 'required',
            'reponse4' => 'required',

        ]);
        $qcm = new Qcm([
            'question' => $request->question,
            'reponse1' => $request->reponse1,
            'reponse2' => $request->reponse2,
            'reponse3' => $request->reponse3,
            'reponse4' => $request->reponse4,
        ]);
        $qcm->save();
        return redirect()->back();
    } 


    



    //   /* function Formation */ 

    //   public function create_formation(Request $request)
    //   {
    //       $request->validate([
    //           'nomformation' => 'required',
    //           'date_debut' => 'required',
    //           'date_fin' => 'required' ,
              
    //         ]);

    //       $formation = new Formation();
    //       $formation->nom = $request->nomformation;
    //       $formation->date_debut = $request->date_debut;
    //       $formation->date_fin = $request->date_fin;
              
    //       $formation->save();
     
    //       return redirect()->back();
    //   } 


    //   /* function Matiere */

    //   public function create_matiere(Request $request){

        
       
    //     $matieres=[];
    //     foreach($request->nommatiere as $key => $value){
    //         array_push($matieres,[
    //             'id_formation' => $request->id_formation,
    //             'nom' => $request->nommatiere[$key],
    //             'id_utilisateurs' => $request->id_formateur[$key],
    //         ]);
    //     }

    //     Matiere::insert($matieres);

    //      return redirect()->back(); 
        
    

    //   }


      
    //   /* function Choisi un formateur */

    //   private function select_formateur()
    //   {
    //       $selectformateur=DB::select('select id , CONCAT(nom, " ", prenom) AS nom_complet from utilisateurs where role = "formateur"');
    //       return $selectformateur ;
          
    //   }
    //   private function select_formation()
    //   {
    //     $selectformation=DB::select('select id_formation , nom , CONCAT(date_debut,"/",date_fin) as date_complet from formation');
    //     return $selectformation;
    //   }
    //   private function select_matiere()
    //   {
    //     $selectmatiere=DB::select('select id_matiere , nom from matiere');
    //     return $selectmatiere;
    //   }
    
    //   /* Function ADMIN !!!!! */ 

    //   public function admin()
    //   {
    //     $getformations=Formation::all();
    //     $getmatieres=Matiere::all();
        
    //     $selectmatiere=$this->select_matiere();
    //     $selectformateur=$this->select_formateur();
    //     $selectformation=$this->select_formation();
    //     return view('pages.admin', compact('selectformateur','selectformation','getformations','getmatieres','selectmatiere'));
    //   }

    //   /* Function Création tout */

    //   public function create_all(Request $request){

       
    //     $formation = new Formation();
    //     $formation->nom = $request->nomformation;
    //     $formation->date_debut = $request->date_debut;
    //     $formation->date_fin = $request->date_fin;
            
    //     $formation->save();
    //     $matieres=[];

    //     foreach($request->nommatiere as $key => $value){
    //         array_push($matieres,[
    //             'id_formation' => $formation->id_formation,
    //             'nom' => $request->nommatiere[$key],
    //             'id_utilisateurs' => $request->id_formateur[$key],
    //         ]);
    //     }

    //     Matiere::insert($matieres);

    //     return redirect()->back();      

    //   }
    // /* function edit formation + Matiere */

    // public function edit($id_formation)
    // {
    //     $getformation= Formation::find($id_formation);
    //     $getmatieres=DB::select('select id_matiere, nom, id_utilisateurs from matiere where id_formation = '.$id_formation);
    
        
        
    //     $selectformateur=$this->select_formateur();
    //     return view('pages.edit' , compact('getformation','getmatieres','selectformateur'));
        
    // }

    //  /* function update formation + Matiere */
    // public function update(Request $request, $id_formation , /* $id_matiere , $tabmatiere , $matieresbdd */){


    //     $getformation = Formation::find($id_formation);
    //     $getformation->nom = $request->nomformation;
    //     $getformation->date_debut = $request->date_debut;
    //     $getformation->date_fin = $request->date_fin;

    //     $getformation->save();

       

    //     foreach($request->nommatiere as $key => $value){
    //         if(isset($request->id_matiere[$key])){
    //             $matieres = Matiere::find($request->id_matiere[$key]);
    //         }else{
    //             $matieres= new Matiere();
    //         }
    //             $matieres->id_formation = $id_formation;
    //             $matieres->nom = $request->nommatiere[$key];
    //             $matieres->id_utilisateurs = $request->id_formateur[$key];

    //         $matieres->save();
    //     }

    //     // $matiereId= Matiere::find($request->id_matiere[$key]);
    //     // $tabmatiere=array(matiereId);
        
    //     // $mat=Matiere::all();
    //     // $matieresbdd= $mat->pluck('id_matiere')->all();

    //     // foreach

        

    //     return redirect()->route('pages.admin')->with('success','Formation Mise a Jour!');
    // }
    
    // /* function Delete formation + Matiere */

    // public function delete($id_formation)
    // {
        
    //     $deleteformation = Formation::find($id_formation)->delete();

    //     return redirect()->route('pages.admin');
    // }

      

}