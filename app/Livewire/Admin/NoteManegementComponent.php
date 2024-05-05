<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Livewire\Directory\NotesComponent;
use App\Models\{Note};
use Jantinnerezo\LivewireAlert\LivewireAlert;


class NoteManegementComponent extends Component
{
    use LivewireAlert;
    public $firstquarterNote = [] ,$secondquarterNote = [] ,$thirdquarterNote = [];
    public $searchStudent,$studentnumberbi,$courseofstudent;
    
 
    public function render(){
    
        return view('livewire.admin.note.note-manegement-component',[
            'allstudentnotes' => $this->allnotesofstudents(),  
            'allcourses' => $this->avaliableCourses(),                    
        ])->layout('layouts.admin.app');        
    }

    public function allnotesofstudents (){
        try {
            //code...
           $data = new NotesComponent();
           $this->dynamicValuesOfNotesOnInputs();
           
           if(empty($this->studentnumberbi) && empty($this->searchStudent) && empty($this->courseofstudent)){
               return $data->getNotesOfStudents();           
            
            }else{
                return $this->searchStudent();
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

    public function dynamicValuesOfNotesOnInputs(){
        try{
            $notes = Note::get();

            foreach($notes as $key => $value){
                $this->firstquarterNote[$key] = [$value->note1_quarter];
                $this->secondquarterNote[$key] = [$value->note2_quarter];
                $this->thirdquarterNote[$key] = [$value->note3_quarter];
            }  

        }catch(\Exception $ex){
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
            
        

    }

    public function searchStudent(){
        try {
            //code...
            if(!empty($this->studentnumberbi)){
                return Note::join("students", "notes.student_id","=","students.id")
                ->join("courses", "notes.course_id","=","courses.id")
                ->join("disciplines","notes.discipline_id","=","disciplines.id")
                ->where("students.number_bi",$this->studentnumberbi)
                ->get(["notes.*", "notes.id As noteid", "courses.*", "students.*", "disciplines.*"]);
                
            }else if(!empty($this->searchStudent) && empty($this->studentnumberbi) && empty($this->courseofstudent)){
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
            
            }else if(empty($this->studentnumberbi) && !empty($this->searchStudent) and !empty($this->courseofstudent)){
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

    public function avaliableCourses(){
        try {
            //code...
            $data = new NotesComponent();
            return $data->listofcourses();

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);        }
    }

    public function updatenote($id){
        //Inicializa a transação ou operação
        \DB::BeginTransaction();

        try {
            //code...
            $notes = Note::find($id);
            foreach($notes as $key=> $value){
                dd($this->firstquarterNote[$key]);
            }


            

         
        //Faz o commit da transação e em caso de ocorrer algum erro no processso não salva no banco
        \DB::commit();

        } catch (\Throwable $th) {
            dd($th->GetMessage());
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
