<div class="card">
    <div class="card-body">
        <form  wire:submit.prevent = "store">
            <div class="form-group mb-3">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" wire:model="nom">
                @error('nom')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="prenom">Prenom:</label>
               <input type="text" wire:model="prenom" class="form-control" >
               @error('prenom')
               <span class="text-danger">{{ $message }}</span>
           @enderror
            </div>
            <div class="form-group mb-3">
                <label for="prenom">email:</label>
               <input type="email" wire:model="email" class="form-control" >
               @error('email')
               <span class="text-danger">{{ $message }}</span>
           @enderror
            </div>
            <div class="form-group mb-3">
                <label for="telephone">Telephone:</label>
               <input type="text" wire:model="telephone" class="form-control" id="telephone">
               @error('telephone')
               <span class="text-danger">{{ $message }}</span>
           @enderror
            </div>
            <div class="form-group mb-3">
                <label for="telephone">password:</label>
               <input type="password" wire:model="password" class="form-control" id="password">
               @error('password')
               <span class="text-danger">{{ $message }}</span>
           @enderror
            </div>
            <div class="form-group mb-3">
                <input type="radio" wire:model="gener" value="0"><label>Male</label>
                <input type="radio" wire:model="gener" value="1"><label>FeMale</label>
            </div>
            <div class="d-grid gap-2">
                <button  class="btn btn-success btn-block" type="submit">Save</button>
                <button wire:click.prevent="Canseluser()" class="btn btn-secondary btn-block" >Cancel</button>
            </div>
        </form>
    </div>
</div>
