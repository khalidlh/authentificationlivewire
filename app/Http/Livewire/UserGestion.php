<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserGestion extends Component
{
    public $users;
    public $nom, $prenom, $email, $telephone, $gener, $password,$adduser= false,$updateuser =false;
    public $user_id;
    public function render()
    {
        $this->users = User::all();
        return view('livewire.user-gestion');
    }
     public function resetFields(){
        $this->nom = '';
        $this->prenom = '';
        $this->email = '';
        $this->telephone = '';
        $this->gener = '';
        $this->password = '';
     }
     public function Canseluser(){
        $this->adduser = false;
        $this->updateuser = false;
     }
    // protected $rules = [
    //     'nom' => 'required',
    //     'prenom' => 'required',
    //     'email' => 'required|email',
    //    // 'gener' => 'required',
    //     'password' => 'required'
    // ];
    public function adduser()
    {
        $this->resetFields();
         $this->updateuser = false;
        $this->adduser = true;  
    }
    public function store(){
        
        $validatedData = $this->validate(
            [
                'nom' => 'required|min:6',
                'email' => ['email', 'required'],
                'prenom' => 'required',
                'telephone' => ['required'],
                'gener' => 'required',
                'password' => 'required|min:8|max:12',
              
            ]
        );
      //dd($validatedData);
        try{
        User::create([
            'Nom' => $this->nom,
            'Prenom' => $this->prenom,
            'Telephone' => $this->telephone,
            'Genre' => $this->gener,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        session()->flash('success','user Created Successfully!!');
       //$this->resetFields();
        //$this->adduser = true;  
      } catch (\Exception $ex) {
        session()->flash('error','Something goes wrong!!');
    }
    }

    public function editUser($id){
        try {
            $user = User::findOrFail($id);
            if( !$user) {
                session()->flash('error','Post not found');
            } else {
                $this->nom = $user->Nom;
                $this->prenom = $user->Prenom;
                $this->email = $user->email;
                $this->user_id = $user->id;
                $this->updateuser = true;
                $this->adduser = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
 
    }
 
    /**
     * update the post data
     * @return void
     */
    public function updateUser()
    {
         
        $validatedData = $this->validate(
            [
                'nom' => 'required|min:6',
                'email' => ['email', 'required'],
                'prenom' => 'required',
                'telephone' => ['required'],
                'gener' => 'required',
                'password' => 'required|min:8|max:12',
              
            ]
        );
        try {
            User::whereId($this->user_id)->update([
                'Nom' => $this->nom,
                'Prenom' => $this->prenom,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'Gener' => $this->gener
            ]);
            session()->flash('success','User Updated Successfully!!');
            $this->resetFields();
            $this->updateuser = false;
        } catch (\Exception $ex) {
            session()->flash('success','Something goes wrong!!');
        }
    }

    public function deleteUser($id)
    {
        try{
            User::find($id)->delete();
            session()->flash('success',"Post Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }
}
