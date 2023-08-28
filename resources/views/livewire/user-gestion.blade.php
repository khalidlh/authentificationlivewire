<div>
@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
@endif
@if ($adduser)
    @include('livewire.create')
@endif
@if($updateuser)
@include('livewire.update')
@endif
<div class="">
@if(!$adduser)
<button wire:click="adduser()" class="btn btn-primary btn-sm float-right">Add New Post</button>
<!-- Button trigger modal --> 
{{-- <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
    Add New Post
  </button> --}}
</div>
@endif
<div class="table-title">
    <div class="row">
        <div class="col-sm-8">
            <h2>les utilsateurs </h2>
        </div>
        <div class="col-sm-4">
            <div class="search-box">
                <i class="material-icons">&#xE8B6;</i>
                <input type="text" class="form-control" placeholder="Search&hellip;">
            </div>
        </div>
    </div>
</div>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>email </th>
            <th>Telephone</th>
            <th>gener</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->Nom }}</td>
                <td>{{ $user->Prenom }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->Telephone }}</td>
                <td>
                    @if ($user->Genre == 0)
                        {{ 'Male' }}
                    @else
                        {{ 'Female' }}
                    @endif
                </td>
                <td>
                    {{-- <a href="#" class="view" title="View" data-toggle="tooltip"><i
                            class="material-icons">&#xE417;</i></a> --}}
                    <a wire:click="editUser({{$user->id}})" class="edit" title="Edit" data-toggle="tooltip" role="button"><i
                            class="material-icons">&#xE254;</i></a>
                    <a href="#" class="delete" title="Delete" data-toggle="tooltip" wire:click="deleteUser({{$user->id}})" role="button"><i
                            class="material-icons">&#xE872;</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="clearfix">
    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
    <ul class="pagination">
        <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
    </ul>
</div>
</div>

  
  {{-- <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                            <button wire:click.prevent="cancelPost()" class="btn btn-secondary btn-block" disabled>Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}