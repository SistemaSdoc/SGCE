<?php

namespace App\Livewire\Directory;
use Livewire\Component;
use App\Models\{Note,Course,Certified};
use Jantinnerezo\LivewireAlert\LivewireAlert;

class NotesComponent extends Component
{
    use LivewireAlert;

    public $studentnumberbi,$searchStudent,$courseofstudent,$firstquarterNote = [],$secondquarterNote = [] ,$thirdquarterNote = [] ;

    public function render(){
        return view('livewire.directory.notes.notes-component',[
        'allstudentnotes' => $this->getNotesOfStudents(),
        'allcourses' => $this->listofcourses(),
        ])->layout("layouts.directory.app");
        
    }


    public function getNotesOfStudents(){
        try {
            if(!empty($this->studentnumberbi)){
                
                return Note::join("students", "notes.student_id","=","students.id")
                ->join("courses", "notes.course_id","=","courses.id")
                ->join("disciplines","notes.discipline_id","=","disciplines.id")
                ->where("students.number_bi",$this->studentnumberbi)
                ->get(["notes.*", "notes.id As noteid", "courses.*", "students.*", "disciplines.*"]);

            }elseif(empty($this->searchStudent) and empty($this->courseofstudent)){

                return Note::join("students", "notes.student_id","=","students.id")
                ->join("courses", "notes.course_id","=","courses.id")
                ->join("disciplines","notes.discipline_id","=","disciplines.id")
                ->get(["notes.*", "notes.id As noteid", "courses.*", "students.*", "disciplines.*"]);
            
            }else if(!empty($this->searchStudent) and empty($this->courseofstudent)){
                
                return Note::join("students", "notes.student_id","=","students.id")
                ->join("courses", "notes.course_id","=","courses.id")
                ->join("disciplines","notes.discipline_id","=","disciplines.id")
                ->where("students.name", 'like',"%".$this->searchStudent."%")
                ->get(["notes.*", "notes.id As noteid", "courses.*", "students.*", "disciplines.*"]);

            }else if(empty($this->searchStudent) and !empty($this->courseofstudent)){
                
                return Note::join("students", "notes.student_id","=","students.id")
                ->join("courses", "notes.course_id","=","courses.id")
                ->join("disciplines","notes.discipline_id","=","disciplines.id")
                ->where("courses.id","=",$this->courseofstudent)
                ->get(["notes.*", "notes.id As noteid", "courses.*", "students.*", "disciplines.*"]);
                
            
            }else{                
                return Note::join("students", "notes.student_id","=","students.id")
                ->join("courses", "notes.course_id","=","courses.id")
                ->join("disciplines","notes.discipline_id","=","disciplines.id")
                ->where("students.name", 'like',"%".$this->searchStudent."%")
                ->where("courses.id","=",$this->courseofstudent)
                ->get(["notes.*", "notes.id As noteid", "courses.*", "students.*", "disciplines.*"]);
            }


        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);  
        }
    }

    public function listofcourses(){
        try {
            return Course::get();

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    public function logout(){
        try {
          Auth::logout();
          return back();

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    public function lauchstudentnotes($noteid){
        try {
            \DB::BeginTransaction();
            //code... 
             $id = $noteid;
             

             $foundstudent = Note::join("students","notes.student_id","=","students.id")
             ->join("courses","notes.course_id","=","courses.id")
             ->join("disciplines","notes.discipline_id","=","disciplines.id")
             ->where('notes.id',$id)
             ->first();


             if (empty($this->firstquarterNote)){
                
                $this->alert('warning', 'AVISO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'timer' => '120000',
                    'text'=>'Digite o valor da 1ª nota do trimestre ao aluno(a) '
                    .$foundstudent->name.' para disciplina de '
                    .$foundstudent->disciplinename
                ]);
             }else if(empty($this->secondquarterNote)){

                $this->alert('warning', 'AVISO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'timer' => '120000',
                    'text'=>'Digite o valor da 2ª nota do trimestre ao aluno(a) '
                    .$foundstudent->name.' para disciplina de '
                    .$foundstudent->disciplinename
                ]);

             }else if(empty($this->thirdquarterNote)){

             $this->alert('warning', 'AVISO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'timer' => '120000',
                    'text'=>'Digite o valor da 3ª nota do trimestre ao aluno(a) '
                    .$foundstudent->name.' para disciplina de '
                    .$foundstudent->disciplinename
             ]);

             }else{
                
                foreach($this->firstquarterNote as $note1){
                    foreach($this->secondquarterNote as $note2){
                        foreach($this->thirdquarterNote as $note3){
                            //Calculate the final average               
                            $finalaverage = ($note1 + $note2 + $note3)/3;

                            Note::where('id',$id)->update([
                                "note1_quarter" => $note1,
                                "note2_quarter" => $note2,
                                "note3_quarter" => $note3,
                                "average" => $finalaverage,
                            ]);

                        }
                   
                    }                   
                }

                  //Store on certificates table
                  $detailsAboutstudent = Note::where('id',$id)->first();                                       

                  Certified::create([
                      "date" => \Carbon\Carbon::now()->format("y-m-d"),
                      "qrcode" => route('validation.certified',$detailsAboutstudent['id']),
                      "signature"=> auth()->user()->fullname,
                      "course_id" => $detailsAboutstudent['course_id'],
                      "student_id" => $detailsAboutstudent['student_id'],
                      "note_id" => $detailsAboutstudent['id'],
                  ]);
            }             
             
            \DB::commit();
         
        } catch (\Throwable $th) {
            
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }

    }    

    
    
}

