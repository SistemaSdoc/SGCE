<?php

namespace App\Livewire\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\{User};
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AccountComponent extends Component
{
    use LivewireAlert;

    public $name,$birthday,$phone,$email,$currentpassword,$newpassword;
   
    protected $rules = [
        'name' => 'required',
        'birthday' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'currentpassword' => 'required',
    ];
    protected $messages = [
        'name.required' => 'obrigatório*',
        'birthday.required' => 'obrigatório*',
        'email.required' => 'obrigatório*',
        'phone.required' => 'obrigatório*',
        'currentpassword.required' => 'obrigatório*',
    ];

    public function render(){
        return view('livewire.auth.account-component',[
            'data' =>$this->detailsofauthenticateduser()
        ])->layout('layouts.directory.app');
    }

    public function detailsofauthenticateduser(){
        try{

            $this->name = auth()->user()->fullname;
            $this->birthday = auth()->user()->birthday;
            $this->email = auth()->user()->email;
            $this->phone = auth()->user()->phonenumber;

        }catch(\Throwable $th){
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'timer' => '120000',
                'text'=>'Falha ao realizar operação'
            ]);
        }
    }

    public function update(){    
        $this->validate($this->rules,$this->messages);
        try {
            //code...
            if(\Hash::check($this->currentpassword,auth()->user()->password)){

                if(!empty($this->newpassword)){
                    User::where('id',auth()->user()->id)->update([ 'password' => \Hash::make($this->newpassword)]);
                }
                
                User::where('id',auth()->user()->id)->update([                   
                    'fullname' => $this->name,
                    'birthday' => $this->birthday,
                    'email' => $this->email,
                    'phonenumber' => $this->phone,
                ]); 

                $this->alert('success', 'SUCESSO', [
                    'toast'=>false,
                    'position'=>'center',
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'OK',
                    'text'=>'Operação Realizada Com Sucesso.'
                ]); 
                
                return redirect()->to('/minha/conta/detalhes/');
               
                
                $this->clearFiels();        

            }else{
                
                   $this->alert('error', 'ERRO', [
                       'toast'=>false,
                       'position'=>'center',
                       'showConfirmButton' => true,
                       'confirmButtonText' => 'OK',
                       'text'=>'Senha Actual inválida'
                   ]);
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

    public function clearFiels(){
        $this->newpassword = '';
        $this->currentpassword = '';
    }

    
}
