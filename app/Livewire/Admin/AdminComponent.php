<?php

namespace App\Livewire\Admin;
use Livewire\Component;
use App\Livewire\Directory\{
    StudentComponent As DirectoryStudentComponent,
    CertifiedComponent As DirectoryCertifiedComponent,
    
    HomeComponent As DirectoryHomeComponent
};
use Illuminate\Support\Facades\Auth;
use App\Livewire\Directory\Component\{SchoolComponent As SchoolHomeComponent};
use App\Models\{User};
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AdminComponent extends Component
{
    use LivewireAlert;

    //Public variables for Edit
    public $iddisciplineEdit,$idcourseEdit,$idschoolEdit,$idstudentEdit ,$data;
    protected $listeners = ['confirmlogout' => 'confirmlogout'];
    

    public function render()
    {
        return view('livewire.admin.home-component',[
            'studentsquantity' => $this->adminQuantityOfStudents(),
            'schoolsquantity' => $this->adminQuantityOfSchools(),
            'usersquantity' => $this->quantityofusers(),
            'certifiedquantity' => $this->adminQuantityOfCertified(),
            'coursesquantity' => $this->adminQuantityOfCourse(),
            
        ])
        ->layout('layouts.admin.app');
    }

    //Métods that are inherit of other components

    public function adminQuantityOfStudents(){
        try {
            //code...
            $data = new  DirectoryHomeComponent();
            return $data->studentsquantity();            

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

    public function adminQuantityOfSchools(){
        try {
            //code...
            $data = new SchoolHomeComponent();
            return $data->schoolsquantity();

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

    public function adminQuantityOfCertified(){
        try{
            $data = new  DirectoryHomeComponent();
            return $data->certifiedquantity();
            
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

    public function adminQuantityOfCourse(){
        try {
            //code...
            $data = new  DirectoryHomeComponent();
            return $data->coursesquantity();
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
        try {
            //code...
            $data = new  DirectoryStudentComponent();
            return $data->buttonclosemodalstudent();
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

    public function quantityofusers(){
        try {
            //code...
            return User::count();

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
