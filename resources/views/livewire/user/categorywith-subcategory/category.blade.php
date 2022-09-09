<div>
  {{-- <div class="container" style="padding: 30px 0">
      <div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            Update Profile
          </div>
          <div class="panel-body">
            <div class="form">
             <form>
              <div class="col-md-4">
                @if ($user->state->image)

                <img src="{{asset('assets/img/profile-img.jpg')}}/{{$user->image}}" width="100%" alt="" class="">
                 @else 
                 <img src="{{asset('assets/img/profile-img.jpg')}}" width="100%" alt="" class="">

                @endif

                <input type="file" class="form-control" wire:model="state.image">
              </div>
              <div class="col-md-8">
                <p><b>Name: </b><input type="text" class="form-control" wire:model="state.name"></p>
                <p><b>Email: </b><input type="text" class="form-control" wire:model="state.email"></p>
                <p><b>contact: </b><input type="text" class="form-control" wire:model="state.contact"></p>
                 <p><b>Password: </b><input type="text" class="form-control" wire:model="state.password"></p>
                <p><b>Amount: </b><input type="text" class="form-control" wire:model="state.amount"></p>
                <p><b>Gender: </b><input type="text" class="form-control" wire:model="state.gender"></p>
               
              </div>
             </form>
            </div>
          </div>
        </div>
      </div>
  </div> --}}
{{$state}}
  <section class="my-5">
    @if (session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Profile Information</h5>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form wire:submit.prevent="updateProfileInformation" role="form">
                <div wire:ignore class="form-group">
                    <label for="sta">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="sta"
                        wire:model="name"
                    />
                </div>

                <div class="form-group">
                    <label for="state.email">Email Address</label>
                    <input
                        type="email"
                        class="form-control"
                        id="state.email"
                        wire:model="email"
                    />
                </div>
                <div class="form-group">
                  <label for="state.contact">Contact</label>
                  <input
                      type="contact"
                      class="form-control"
                      id="state.contact"
                      wire:model="contact"
                  />
              </div>
              {{-- <div class="form-group">
                <label for="state.amount">Amount</label>
                <input
                    type="text"
                    class="form-control"
                    id="state.amount"
                    wire:model="amount"
                />
            </div> --}}

            <div class="form-group">
              <label for="state.gender">Gender</label>
              <input
                  type="text"
                  class="form-control"
                  id="state.gender"
                  wire:model="gender"
              />
          </div>

          <div class="form-group">
            <label for="state.image">Image</label>
            <input
                type="file"
                class="form-control"
                id="state.image"
                wire:model="image"
            />
        </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Info</button>
                </div>
            </form>
        </div>
    </div>
</section>


</div>
