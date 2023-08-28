<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\Mailoublier;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Authentification extends Component
{
    public $TestEtatForm = 1;
    public $nom, $prenom, $email, $telephone, $gen, $password, $confirm_password;
    public $email_login, $password_login;
    public $email_oublier;
    public function Seconnecterform()
    {
        $this->TestEtatForm = 1;
    }
    public function Oubliermotepasseform()
    {
        $this->TestEtatForm = 2;
    }
    public function Sinscrireform()
    {
        $this->TestEtatForm = 0;
    }
    public function render()
    {
        return view('livewire.authentification');
    }
    public function store()
    {
        $validatedData = $this->validate(
            [
                'nom' => 'required|min:6',
                'email' => ['email', 'required', 'unique:users'],
                'prenom' => 'required|min:6',
                'telephone' => ['required'],
                'gen' => 'required',
                'password' => 'required|min:8|max:12',
                'confirm_password' => 'required|min:8|max:12',

            ]
        );
        User::create([
            'Nom' => $this->nom,
            'Prenom' => $this->prenom,
            'Telephone' => $this->telephone,
            'Genre' => $this->gen,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        //return $this->TestEtatForm++;
    }
    public function login()
    {
        $validatedData = $this->validate(
            [
                'email_login' => ['email', 'required'],
                'password_login' => ['required', 'min:8', 'max:12']
            ]
        );
        $user = User::where('email', $this->email_login)->first();
        // dd($user);
        if ($user) {
            if (Hash::check($this->password_login, $user->password)) {
                return redirect()->route('getionusers');
            } else {
                dd($validatedData);
            }
        }
    }

    public function resetPassword()
    {

        $validatedData = $this->validate(
            [
                'email_oublier' => ['email', 'required'],

            ]
        );
        $users = User::where('email', $this->email_oublier)->first();
     // dd($users);
      
                Mail::to($this->email_oublier)->send(new Mailoublier($users));
           
        //     //session()->put('emailpassword', $this->email_oublier);
        //    // return redirect()->route('login')->with('success', 'Un message a été envoyé à votre adresse e-mail');
        //      return "khalid";
        
    }
}
