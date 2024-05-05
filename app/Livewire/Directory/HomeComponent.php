<?php

namespace App\Livewire\Directory;
use App\Models\Course;
use App\Models\{Certified,Discipline,CourseDiscipline,Note,School,Student,User};
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Livewire\Directory\Component\{SchoolComponent As DrectorySchoolComponent};

class HomeComponent extends Component
{


    use LivewireAlert;
    //Public variables
    public $selectSchool;


   //Public variables of course
   public $schoolcourses, $courseofschool,$coursename,$courseduration,$coursedescription;

  
   //Public variables disciplines
   public $disciplinename, $disciplinedescription, $course, $courseofdiscipline;

    //Public variables for Edit
    public $iddisciplineEdit,$idcourseEdit;

    //Public variables for User
    public $username,$userbirthday, $useremail,$userphone,$userpassword;


    //Public variables of  school
    public $schooldescription = null, $idschoolEdit, $schoolinitials = null,
    $schoolname = null,$schoolmunicipality = null, $schoolprovince = null,$schoollocation = null;
  

    protected $courseRules = ['coursedescription' => 'required','courseduration' => 'required','coursename' => 'required','courseofschool' => 'required',
    ];

    protected $courseMessages = ['coursedescription.required' => 'obrigatório*','courseduration.required' => 'obrigatório*','courseofschool.required' => 'obrigatório*','coursename.required' => 'obrigatório*'];

    protected $disciplineRules = ['disciplinedescription' => 'required','courseofdiscipline' => 'required','disciplinename' => 'required'];
    protected $disciplineMessages = ['disciplinedescription.required' => 'obrigatório*','courseofdiscipline.required' => 'obrigatório*','disciplinename.required' => 'obrigatório*'];


    
    protected $listeners = ['confirmlogout' => 'confirmlogout'];

    protected $schoolrules = [
        'schoolinitials' => 'required',
        'schooldescription' =>'required',
        'schoolmunicipality' => 'required',
        'schoolprovince' =>'required',
        'schoollocation' =>'required',
        'schoolname' => 'required|unique:schools'
    ];

    
    protected $schoolmessages = [
        'schoolinitials.required'=>'obrigatório*',
        'schooldescription.required'=>'obrigatório*',
        'schoolmunicipality.required'=>'obrigatório*',
        'schoolprovince.required' =>'obrigatório*',
        'schoollocation.required' =>'obrigatório*',
        'schoolname.required' =>'obrigatório*',
        'schoolname.unique' =>'Já existe'
    ];


    public function render(){
    
        return view('livewire.directory.home-component',[
        'listofschools' =>$this->getSchools(),
        'studentsquantity' =>$this->studentsquantity(),
        'certifiedquantity' =>$this->certifiedquantity(),
        'coursesquantity' =>$this->coursesquantity(),
        'listofcourses' => $this->listofcourses(),
        'listofdisciplines' => $this->listofdisciplines(), 
        'namesofschools' => $this->schoolnames(),       
        ])->layout('layouts.directory.app');
            

    }

    public function schoolnames(){
        try {
            //code...
            $data = new DrectorySchoolComponent();
            return $data->listofshoolsname();
            
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

    public function certifiedquantity(){
        try {
            //code...           
            return Certified::groupBy("student_id")->count();
            
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

    

    public function saveSchool(){  
        $this->validate($this->schoolrules,$this->schoolmessages);
       
        try {
            \DB::beginTransaction();
        School::create([
            'schoolname' => $this->schoolname,
            'initials' => $this->schoolinitials,
            'description' => $this->schooldescription,
            'province' => $this->scholprovince,
            'municipality' => $this->schoolmunicipality,
            'location' => $this->schoollocation,
            'user_id' => auth()->user()->id,
        ]);

        $this->alert('success', 'SUCESSO', [
            'toast'=>false,
            'position'=>'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'OK',
            'text'=>'Operação Realizada Com Sucesso.'
        ]);

        //Clear the inputs after save the Data
        $this->clearschoolInputs();
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

    public function editschooldata($id){
       
        try {
            //code...
            if(isset($id)){
                $school = School::find($id);
                $this->idschoolEdit = $id;
    
                $this->schoolname = $school['schoolname'];
                $this->schoolinitials = $school['initials'];
                $this->schoolprovince = $school['province'];
                $this->schoolmunicipality = $school['municipality'];
                $this->schoollocation = $school['location'];
                $this->schooldescription = $school['description'];
    
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
    
    public function updateSchool(){
        try {
            //code...
            $id = $this->idschoolEdit;
            School::where('id',$id)->update([
    
                'schoolname' => $this->schoolname,
                'initials' =>  $this->schoolinitials,
                'province' =>  $this->schoolprovince,
                'municipality' =>  $this->schoolmunicipality,
                'location' => $this->schoollocation,
                'description' => $this->schooldescription,
                 'user_id' => auth()->user()->id 
    
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
    
    public function closemodalSchool(){    
        $this->idschoolEdit = null;
        $this->schoolname = '';
        $this->schoolinitials = '';
        $this->schoolprovince = '';
        $this->schoolmunicipality = '';
        $this->schoollocation = '';
        $this->schooldescription = '';
    }        
    
    public function clearschoolInputs(){    
        $this->schoolname = '';
        $this->schoolinitials = '';
        $this->schooldescription = '';
        $this->schoolprovince = '';
        $this->schoolmunicipality = '';
        $this->schoollocation = '';
    }

   

    public function listofcourses(){
        try {
            if (empty($this->schoolcourses)){
                return Course::join("schools", "courses.school_id", "=", "schools.id")
                 ->join('users', 'courses.user_id', "=", "users.id")
                 ->get(['courses.*','courses.id AS courseid','courses.description AS coursedescription', 'schools.*']);
                }else{
                    return Course::join("schools", "courses.school_id", "=", "schools.id")
                    ->join('users', 'courses.user_id', "=", "users.id")
                    ->where('courses.school_id', $this->schoolcourses)
                    ->get(['courses.*','courses.id As courseid','courses.description As coursedescription', 'schools.*']);
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

    
  

  

    public function studentsquantity(){
        try {
            //code...
            return Student::join('schools', 'students.school_id', '=', 'schools.id')            
            ->count();

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

    public function coursesquantity(){
        try {
          return Course::count();

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


    public function getSchools(){
        try {
            if (!empty($this->selectSchool)){
                return School::where('schoolname', $this->selectSchool)
                ->get();
            
            }else{
                return School::get();
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

    public function listOfschoolsforInput(){
        try {
            //code...
            return School::get();

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

    public function listofdisciplines(){
        try {
            if(empty($this->course)){

                return CourseDiscipline::join('courses', 'course_disciplines.course_id', "=", 'courses.id')
                ->join('disciplines', 'course_disciplines.discipline_id', "=", 'disciplines.id')
                //->where('users.profile', 'directory')
                ->get(['course_disciplines.*','course_disciplines.id As coursedisciplineid','disciplines.*','courses.*']);
            }else{
                return CourseDiscipline::join('courses', 'course_disciplines.course_id', "=", 'courses.id')
                ->join('disciplines', 'course_disciplines.discipline_id', "=", 'disciplines.id')
                ->where("course_disciplines.course_id",$this->course)
               // ->where('users.profile', 'directory')
                ->get(['course_disciplines.*','course_disciplines.id As coursedisciplineid','disciplines.*','courses.*']);
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



    public function editcoursedata($courseid){

        try {
            //code...
            if(isset($courseid)){
             $courses = Course::join('schools', 'courses.school_id', '=', 'schools.id')->where('courses.id',$courseid)
             ->get(['courses.*', 'schools.*' , 'schools.id As idschool']);
             
             $this->idcourseEdit = $courseid;

             foreach($courses as $course){
                 $this->courseofschool = $course['idschool'];
                 $this->coursename = $course['coursename'];
                 $this->courseduration = $course['duration'];
                 $this->coursedescription = $course['description'];
             }

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

    public function updatecourse(){
        try {
            //code...
            $id = $this->idcourseEdit;
            Course::where('id',$id)->update([
                'coursename' => $this->coursename,
                'school_id' => $this->courseofschool,
                'duration' => $this->courseduration,
                'description' => $this->coursedescription
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

    public function closemodalCourse(){
        $this->idcourseEdit = null;
        $this->courseofschool = null;
        $this->coursename = '';
        $this->courseduration = '';
        $this->coursedescription = '';
    }

    public function editdisciplinedata($coursedisciplineid){
        try{

            if(isset($coursedisciplineid)){
                $data = CourseDiscipline::where('course_disciplines.id',$coursedisciplineid)
                ->join('disciplines', 'course_disciplines.discipline_id', '=','disciplines.id')
                ->join('courses','course_disciplines.course_id','=','courses.id')
                ->get(['course_disciplines.*','course_disciplines.id As coursedisciplineid', 'courses.*','courses.id As courseId', 'disciplines.*']);
                
                $this->iddisciplineEdit = $coursedisciplineid;            
                
                foreach($data as $datadiscipline){
                    $this->courseofdiscipline = $datadiscipline["courseId"];
                    $this->disciplinename = $datadiscipline["disciplinename"];
                    $this->disciplinedescription = $datadiscipline["description"];
                }

             
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

    public function updateDiscipline(){
        try {
            \DB::BeginTransaction();

            $id = $this->iddisciplineEdit;
            //Update data of table many to many CourseDiscipline
            CourseDiscipline::where('id',$id)->update([
                'course_id' => $this->courseofdiscipline,
            ]);

            //Update description of Discipline
            $data = CourseDiscipline::where('id',$id)->first();
            Discipline::where('id',$data["discipline_id"])->update([
                'disciplinename' => $this->disciplinename,
                'description' => $this->disciplinedescription
            ]);

            $this->alert('success', 'SUCESSO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Operação Realizada Com Sucesso.'
            ]);

            \DB::commit();
            
        } catch (\Throwable $th) {
            dd($th->getMessage());
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    public function closemodaldiscipline(){
        $this->iddisciplineEdit = null;
        $this->courseofdiscipline = null;
        $this->disciplinename = '';
        $this->disciplinedescription = '';

    }



    public function saveCourse(){
        $this->validate($this->courseRules,$this->courseMessages);
        try {

            Course::create([
                'coursename' => $this->coursename,
                'description' => $this->coursedescription,
                'duration' => $this->courseduration,
                'school_id' => $this->courseofschool,
                'user_id' => auth()->user()->id,
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

    public function saveDiscipline(){
        //Validation
        $this->validate($this->disciplineRules,$this->disciplineMessages);
        try {
           //Save Discipline
            $data = Discipline::create([
                'disciplinename' => $this->disciplinename,
                'description' => $this->disciplinedescription,
                'user_id' => auth()->user()->id
            ]);

           //Save data to table ManytoMany
            CourseDiscipline::create([
                'course_id' => $this->courseofdiscipline,
                'discipline_id' => $data['id'],
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




    public function logout(){
        try {

            $this->alert('warning', 'Confirmar', [
                'icon' => 'warning',
                'position' => 'center',
                'toast' => false,
                'text' => "Deseja realmente terminar sessão?",
                'showConfirmButton' => true,
                'showCancelButton' => true,
                'cancelButtonText' => 'Cancelar',
                'confirmButtonText' => 'Excluir',
                'confirmButtonColor' => '#3085d6',
                'cancelButtonColor' => '#d33',
                'timer' => '120000',
                'onConfirmed' => 'confirmlogout'
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

    public function confirmlogout(){
        try {
            //code...
            Auth::logout();
            return redirect()->to('/');

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

    






        public function saveUser(){
            try {
                //code...
                User::create([
                    'fullname' => $this->username,
                    'birthday' => $this->userbirthday,
                    'email' =>  $this->useremail,
                    'phonenumber' =>  $this->userphone,
                    'password' => \Hash::make($this->userpassword),


                ]);

                $this->alert('success', 'SUCESSO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text'=>'Operação Realizada Com Sucesso.'
                ]);

                $this->clearInputsofUser();
               

            } catch (\Throwable $th) {
                dd($th->getMessage());
                $this->alert('error', 'ERRO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text'=>'Falha ao realizar operação'
                ]);
            }
            
        }

        public function clearInputsofUser(){
            $this->username = '';
            $this->userbirthday = '';
            $this->useremail = '';
            $this->userphone = '';
            $this->userpassword = '';
        }

}
