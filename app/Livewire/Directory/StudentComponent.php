<?php

namespace App\Livewire\Directory;

use Livewire\Component;
use App\Models\{Student,School,Course};

use Jantinnerezo\LivewireAlert\LivewireAlert;
class StudentComponent extends Component
{
    use LivewireAlert;

    //Public variables of student
   public $idstudentEdit, $studentaddress ,$searchStudent,$phonenumberstudent,$studentmothername,$studentemail,$studentfathername,$studentnationality,$studentstreet,$studentcourse,$studentbirthday,$studentnumberbi, $studentlocation, $studentname,$studentprovince,$studentmunicipality,$studentschool;


    protected $rules = ["studentcourse" => "required",
    "studentschool" => "required", "studentname" => "required",
    "studentbirthday" => "required","studentnumberbi" => "required",
    "studentprovince" => "required","studentmunicipality" => "required",
    "studentnationality" => "required","studentstreet" => "required",
    "studentaddress" => "required","studentfathername" => "required",
    "studentemail" => "required","studentmothername" => "required",
    "phonenumberstudent" => "required"
    ];

    protected $messages = ["studentschool.required" => "obrigatório*",
    "studentcourse.required" => "obrigatório*","studentname.required" => "obrigatório*",
    "studentbirthday.required" => "obrigatório*","studentnumberbi.required" => "obrigatório*",
    "studentprovince.required" => "obrigatório*","studentmunicipality.required" => "obrigatório*",
    "studentstreet.required" => "obrigatório*","studentnationality.required" => "obrigatório*",
    "studentaddress.required" => "obrigatório*","studentfathername.required" => "obrigatório*",
    "studentemail.required" => "obrigatório*","studentmothername.required" => "obrigatório*",
    "phonenumberstudent.required" => "obrigatório*"
    ];

    public function render()
    {
        return view('livewire.directory.student.student-component',[
         'listofstudents' =>$this->getStudents(),
         'schoolnames' =>$this->schoolnames(),
         'listofcourses' => $this->listofcourses(),
        ])->layout('layouts.directory.app');
    }

    public function getStudents(){
        try {
            //code...
            if(empty($this->searchStudent)){
               return Student::join("courses", "students.course_id","=","courses.id")
               ->join("schools", "students.school_id","=","schools.id")
               ->get(["students.*" ,"students.id As id_student", "schools.schoolname","courses.coursename"]);
     

             }else{
                return Student::join("courses", "students.course_id","=","courses.id")
                ->join("schools", "students.school_id","=","schools.id")
                ->where("students.name","like","%".$this->searchStudent."%")
                ->get(["students.*" ,"students.id As id_student", "schools.schoolname","courses.coursename"]);
      
             }
        } catch (\Throwable $th) {  
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);        }
    }

    public function saveStudent(){
                
        //$this->validate($this->rules,$this->messages);
        try { 
            
            $student = Student::create([
                'name' => $this->studentname,
                'birthday' => $this->studentbirthday,
                'number_bi' => $this->studentnumberbi,
                'studentprovince' => $this->studentprovince,
                'municipality' => $this->studentmunicipality,
                'address' => $this->studentaddress,
                'province' => $this->studentprovince,
                'fathername' => $this->studentfathername,
                'email' => $this->studentemail,
                'phonenumber' => $this->phonenumberstudent,
                'nationality' => $this->studentnationality,
                'mothername' => $this->studentmothername,
                'user_id' => auth()->user()->id,
                'school_id' => $this->studentschool,
                'course_id' => $this->studentcourse,
            ]);

            //Obter as disciplinas do curso o qual o estudante foi Registado
            $data = CourseDiscipline::where("course_id",$this->studentcourse)
            ->get();

            //Registar no banco 
            foreach($data as $courseAndDisciplineOfStudent) {
                Note::create([
                    "student_id" => $student["id"],
                    "discipline_id" => $courseAndDisciplineOfStudent["discipline_id"],
                    "course_id" => $courseAndDisciplineOfStudent["course_id"],
                ]);
            }            

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
            ]);

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

    public function editstudentdata($id){
        try{

            if(isset($id)){
                $data = Student::find($id);
                $this->idstudentEdit = $data["id"];            
                
                $this->studentname = $data["name"];
                $this->studentbirthday = $data["birthday"];
                $this->studentschool = $data["school_id"];
                $this->studentcourse = $data["course_id"];
                $this->studentnumberbi = $data["number_bi"];
                $this->studentprovince = $data["province"];
                $this->studentmunicipality = $data["municipality"];
                $this->studentnationality = $data["nationality"];
                $this->studentaddress = $data["address"];
                $this->studentfathername = $data["fathername"];
                $this->studentmothername = $data["mothername"];
                $this->phonenumberstudent = $data["phonenumber"];
                $this->studentemail = $data["email"];
            } 

        }catch(\Throwable $th){

            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }

        
    }

    public function updatestudent(){
        try {
            $id = $this->idstudentEdit;

            Student::where("id",$id)->update([
                'name' =>  $this->studentname,
                'school_id' =>  $this->studentschool,
                'course_id' =>    $this->studentcourse,
                'birthday' => $this->studentbirthday,
                'number_bi' => $this->studentnumberbi,
                'province' =>  $this->studentprovince,
                'municipality' =>  $this->studentmunicipality,
                'nationality' =>  $this->studentnationality,
                'address' =>  $this->studentaddress,
                'fathername' =>  $this->studentfathername,
                'mothername' =>  $this->studentmothername,
                'phonenumber' =>  $this->phonenumberstudent,
                'email' =>   $this->studentemail,                
            ]);

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
            ]);
            
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

    public function buttonclosemodalstudent(){
        $this->studentname = '';              
        $this->studentbirthday = '';              
        $this->studentnumberbi = '';              
        $this->studentprovince = '';              
        $this->studentmunicipality = '';
        $this->studentaddress = '';               
        $this->studentprovince = '';              
        $this->studentfathername = '';            
        $this->studentemail = '';                 
        $this->phonenumberstudent = '';
        $this->studentnationality = '';
        $this->studentmothername = '';            
        $this->studentschool = '';                
        $this->studentcourse = '';
        $this->idstudentEdit = null;
}

public function schoolnames(){
    try {
        //code...
        return School::select('schoolname','id')->where('user_id',auth()->user()->id)->get();
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
       
            return Course::join("schools", "courses.school_id", "=", "schools.id")
             ->join('users', 'courses.user_id', "=", "users.id")
             ->get(['courses.*','courses.id AS courseid','courses.description AS coursedescription', 'schools.*']);
        

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
