<?php

namespace App\Livewire\Login;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class HomeComponent extends Component
{
    use LivewireAlert;

    public $email,$password;
    protected $rules = ['email' => 'required', 'password' => 'required'];
    protected $messages = ['email.required' => 'obrigatório*', 'password.required' => 'obrigatório*'];

    public function render()
    {
        return view('livewire.login.home-component')->layout('layouts.login.app');
    }

    public function authenticate(){
        $this->validate($this->rules,$this->messages);

        try{
            $user = User::where('email', $this->email)->first();

            if (!$user){
                $this->alert('error', 'ERRO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text'=>'Não existe uma conta com este e-mail!!!'
                ]);

                return;
            }else{
                 if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
                     if (auth()->user()->profile == 'directory'){
                        return redirect()->route('directory.home');
                        
                    }else if(auth()->user()->profile == 'admin'){
                        return redirect()->route('admin.home');

                     }
                    }else{
                        $this->alert('error', 'ERRO', [
                            'toast'=>false,
                            'position'=>'center',
                            'showConfirmButton' => true,
                            'confirmButtonText' => 'OK',
                            'text'=>'Credências Inválidas!!!'
                        ]);
                    }
            }

        }catch(\Exception $th){
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
