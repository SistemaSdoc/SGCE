<?php

namespace App\Livewire\Directory;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\{Note,Course,Student};
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertifiedComponent extends Component
{
    use LivewireAlert;

    public $searchStudent,$courseofstudent;

    public function render()
    {
        return view('livewire.directory.certified.home-component',[
            'listofstudents' =>$this->getStudents(),
            'allcourses' => $this->getCourses(),
        ])->layout('layouts.directory.app');
        
    }

    public function getCourses(){
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


    public function getStudents(){
        try {
            //code...
            if(empty($this->searchStudent) and empty($this->courseofstudent)){
               return Student::join("courses", "students.course_id","=","courses.id")
               ->join("schools", "students.school_id","=","schools.id")
               ->get(["students.*","students.id As studentid", "schools.schoolname","courses.coursename"]);
     

             }else if(!empty($this->searchStudent) and !empty($this->courseofstudent)){
                 return Student::join("courses", "students.course_id","=","courses.id")
                 ->join("schools", "students.school_id","=","schools.id")
                 ->where("students.name","like","%".$this->searchStudent."%")
                 ->where('students.course_id',$this->courseofstudent)
                 ->get(["students.*","students.id As studentid", "schools.schoolname","courses.coursename"]);

            }else if(!empty($this->searchStudent) and empty($this->courseofstudent)) {

                return Student::join("courses", "students.course_id","=","courses.id")
                 ->join("schools", "students.school_id","=","schools.id")
                 ->where("students.name","like","%".$this->searchStudent."%")
                 ->get(["students.*","students.id As studentid", "schools.schoolname","courses.coursename"]);
                 
                }else if(empty($this->searchStudent) and !empty($this->courseofstudent)){
                    return Student::join("courses", "students.course_id","=","courses.id")
                    ->join("schools", "students.school_id","=","schools.id")
                    ->where('students.course_id',$this->courseofstudent)
                    ->get(["students.*","students.id As studentid", "schools.schoolname","courses.coursename"]);
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

    public function printcertified($studentid){
        try {

            $data = Note::where("student_id",$studentid)
            ->join('students', "notes.student_id", "students.id")
            ->join('disciplines', "notes.discipline_id", "=", "disciplines.id")
            ->join('courses', "notes.course_id", "=", "courses.id")
            ->get();  

            $student = Student::where("id",$studentid)->first();            
            
            $qrCodeLink = route('validation.certified',$student->id);
            $sizeofQrcode = "60";   

            $pdfContent = PDF::loadView('livewire.directory.certified.pdf.home-component',[               
                "data" => $data,               
                "student" => $student,
                "qrCodeLink" => $qrCodeLink,              
                "sizeofQrcode" => $sizeofQrcode, 
                ])->setPaper('A4', 'portrait')
                ->output();            

            return response()->streamDownload(
                fn () => print($pdfContent),
                "certificado-".$studentid.".pdf"
            );
           
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
