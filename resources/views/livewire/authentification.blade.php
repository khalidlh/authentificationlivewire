
    <div class="container">
        @if ($TestEtatForm == 0)
        <form wire:submit.prevent="store">
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
            @csrf
            {{-- @if() --}}
            <h2>Inscription</h2>
            <div class="content">
                <div class="box-content">
                    <label for="fullname">Nom</label>
                    <input type="text" wire:model="nom" placeholder="Entrer votre nom" required>
                    @error('nom') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="box-content">
                    <label for="fullname">Prenom</label>
                    <input type="text" wire:model="prenom" placeholder="Entrer votre prenom" required>
                    @error('prenom') <span class="error">{{ $message }}</span> @enderror

                </div>

                <div class="box-content">
                    <label for="fullname">Email</label>
                    <input type="email" wire:model="email" placeholder="Entrer votre email" required>
                    @error('email') <span class="error">{{ $message }}</span> @enderror

                </div>

                <div class="box-content">
                    <label for="fullname">Tele</label>
                    <input type="number" wire:model="telephone" placeholder="Entrer votre telephone " required>
                    @error('telephone') <span class="error">{{ $message }}</span> @enderror

                </div>

                <div class="box-content">
                    <label for="fullname">Mot de passe</label>
                    <input type="password" wire:model="password" placeholder="Entrer votre password" required>
                    @error('password') <span class="error">{{ $message }}</span> @enderror

                </div>

                <div class="box-content">
                    <label for="fullname">Confirm-mot de passe</label>
                    <input type="password" wire:model="confirm_password" placeholder="Confirm votre password" required>
                    @error('confirm_password') <span class="error">{{ $message }}</span> @enderror
                </div>

                <span class="gender-title">sexe</span>
                <div class="gender">
                    <input type="radio" wire:model="gen" value="0"><label>Male</label>
                    <input type="radio" wire:model="gen" value="1"><label>FeMale</label>
                </div>
            </div>
            @error('gen') <span class="error">{{ $message }}</span> @enderror
            <div class="button-container">
                <button type="submit">s'inscrire</button>
            </div>
        </form>
        <div class="seconnecter">
            Si deja inscrit?<a wire:click="Seconnecterform"> se conecter</a>
        </div>
        @elseif($TestEtatForm == 1)
        <form wire:submit.prevent = "login">
            <h2>Se connecter</h2>
            <div class="img_login">
                <img src="{{asset('assets/img_login.png')}}" alt="img_login" >
            </div>
            <div class="content">
                <div class="box-content">
                    <label for="fullname">Email</label>
                    <input type="email" wire:model="email_login" placeholder="Entrer votre email" required>
                    @error('email_login') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="box-content">
                    <label for="fullname">Mot de passe</label>
                    <input type="password" wire:model="password_login" placeholder="Entrer votre password" required>
                    @error('password_login') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="box-content ">
                    <a wire:click="Oubliermotepasseform">Oublier le mot passe</a>
               </div>
            </div>
            <div class="button-container">
                <button type="submit">se connecter</button>
            </div>
        </form>
        <div class="seconnecter">
            Si vous avez non inscrit?<a wire:click="Sinscrireform"> s'inscrire</a>
        </div>
        @else
        <form wire:submit.prevent = "resetPassword">
            <h2>Oublier le mot passe</h2>
            <div class="content">
                <div class="box-content" >
                    <label for="fullname">Email</label>
                    <input type="email" wire:model="email_oublier" placeholder="Entrer votre email" class="form-control" >
                    @error('email_oublier') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="button-container">
                <button type="submit">Renitialiser</button>
            </div>
        </form>
    <div class="seconnecter">
       <a wire:click="Seconnecterform"> se connecter</a>
    </div>
        @endif
    </div>
</body>
</html>

