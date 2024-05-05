<?php

namespace App\Livewire\User;

use Livewire\Component;

class CertifiedComponent extends Component
{
    public function render($id)
    {
        $data = Student::findOrFail($id);
        return view('livewire.user.certified-component',[
            'data' => $data
        ]);
    }
}
