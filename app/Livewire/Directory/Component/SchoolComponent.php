<?php

namespace App\Livewire\Directory\Component;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\{School};

class SchoolComponent extends Component
{
    use LivewireAlert;           


    public function render()
    {
        return view('livewire.directory.component.school-component',[
            'schoolsquantity' => $this->schoolsquantity(),
        ])->layout('layouts.directory.app');
       
    }  

    public function schoolsquantity(){
        try {
            return School::count();
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text'=>'Falha ao realizar operação'
            ]);        }
    }

    public function listofshoolsname(){
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
            ]);           }
    }

 




}
