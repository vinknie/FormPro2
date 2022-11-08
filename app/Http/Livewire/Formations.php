<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Formation;
use App\Models\Matieres;

use Illuminate\Support\Facades\DB;

class Formations extends Component
{

    public  $nommatiere , $id_utilisateurs , $matiere ;
    public $inputs = [];
    public $i = 1;

    // public function add($i)
    // {
    //     $i = $i + 1;
    //     $this->i = $i;
    //     array_push($this->inputs ,$i);
    // }

    // private function resetInputFields(){
    //     // $this->nomformation = '';
    //     $this->nommatiere = '';
    //     $this->id_utilisateurs='';
    // }

    // public function addformation($idformation){

    //     $validate = $this->validate([
    //         // 'nomformation' => 'required',
    //         'nommatiere.0' => 'required',
    //         'id_utilisateurs.0' => 'required',
    //         'nommatiere.*' => 'required',
    //         'id_utilisateurs.*' => 'required',

    //     ],
    //     [
    //         // 'nomformation.required' => 'Nom de la formation est requis',
    //         'nommatiere.0.required' => 'Nom de la matiere est requis',
    //         'id_utilisateurs.0.required' => 'Nom du formateur est requis',
    //         'nommatiere.*.required' => 'Nom de la matiere est requis',
    //         'id_utilisateurs.*.required' => 'Nom du formateur est requis',
    //     ]);

    //     // foreach ($this->formation as $key => $value){
    //     //     Formation::create(['nomformation' => $this->nom[$key]]);
    //     // }
    //     var_dump($this->matiere);
    //     var_dump($this->inputs);
    //     die;

    //     foreach ($this->matiere as $key => $value){
    //         Matiere::create(['nommatiere' => $this->nom[$key], 'id_utilisateurs'=> $this->id_utilisateurs[$key], $idformation ]);
    //     }

    //     $this->inputs = [];

    //     $this->resetInputFields();

    //     session()->flash('message', 'Formation est bien créer.');
    


    // public function select_formateur()
    //   {
    //       $selectformateur=DB::select('select id , CONCAT(nom, " ", prenom) AS nom_complet from utilisateurs where role = "formateur"');
    //       return $selectformateur ;
          
    //   }



    //   public function admin()
    //   {
        // $selectformateur=$this->select_formateur();
    //     return view('livewire.formations',compact('selectformateur'));
    //   }
   



    // public function render()
    // {
    //     $selectformateur=DB::select('select id , CONCAT(nom, " ", prenom) AS nom_complet from utilisateurs where role = "formateur"');
    //     return view('livewire.formations',compact('selectformateur'))
    //     ->extends('layout.master')
    //     ->section('content');
    //  }

    }

