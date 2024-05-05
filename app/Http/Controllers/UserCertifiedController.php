<?php

namespace App\Http\Controllers;
use App\Models\{Student};
use Illuminate\Http\Request;

class UserCertifiedController extends Controller
{
    public function show($id){
        $data = Student::join('schools','students.school_id','=','schools.id')
        ->where('students.id',$id)
        ->get();
        
        return view('livewire.user.certified-component',[
            'data' => $data
        ]);
    }
}
