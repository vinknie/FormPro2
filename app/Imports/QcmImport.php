<?php

namespace App\Imports;

use Illuminate\Support\TValue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

use App\Models\Qcm;
use App\Models\Question;
use App\Models\Option;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QcmImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        // echo count($rows); exit();
        
        foreach($rows as $row){
            // $qcm =new Qcm();
            // // echo(($row['id_chapitre']));
            // $qcm->id_chapitre=$row['id_chapitre'] ?? Null;
            // $qcm->titre=$row['titre'] ?? Null;
            // // $qcm->save();
            // dd($qcm);
            $qcm = Qcm::Create([
                'id_chapitre' => $row['id_chapitre'],
                'titre' => $row['titre'],
            ]);
            // dd($qcm);

            $question = Question::Create([
                'id_qcm' => $qcm->id_qcm,
                'question' => $row['question'],
                'points' => $row['points'],
                'type' => $row['type'],
            ]);
            
            if($question){
                for($i=6 ; $i<=count($rows)-6;$i+=2){
                    $opt=new Option();
                    if($row[$i] != null){
                        $opt->question_id = $question->id_question;
                        $opt->option=$row[$i];
                        $opt->correct=$row[$i+1];
                        dd($opt);
                    }
                }
            }
            
        }
    

    }

    public function headingRow(): int
    {
        return 3;
    }
}
