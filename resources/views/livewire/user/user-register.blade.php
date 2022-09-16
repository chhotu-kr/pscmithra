<div>
   
        @if ($otpmodal == true)
        <div class="login-form-box registration-form">
            <a href="" wire:click.prevent="back()" class="me-5">Back</a>
            <h3 class="title">Enter Otp</h3>
            <div class="form-group">
                <label for="reg-name">Enter Otp</label>
                <input type="text" wire:model="otp" name="otp"  placeholder="Enter Otp">
                @error('otp') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <button wire:click.prevent="getotpverify()" class="education-btn btn-medium">Check Otp<i class="icon-4"></i></button>
            </div>
            <span class="text-danger">{!! Session::get('otp') !!}</span>
        </div>
        @else
        <div class="login-form-box registration-form">
            <h3 class="title">Registration</h3>
            <p>Already have an account? <a href="{{route('user.login')}}">Sign in</a></p>
            <form  method="post">
              
                <div class="form-group">
                    <label for="reg-name">Name</label>
                    <input type="text" wire:model="name" name="name"  placeholder="Full name">
                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="log-email">UserEmail</label>
                    <input type="text" wire:model="email" name="email"  placeholder="Email or username">
                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-group">
                    <label for="log-email">UserContact</label>
                    <input type="text" wire:model="contact" name="contact" placeholder="Email or username">
                    @error('contact') <span class="error text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-group">
                    <label for="log-password">Password</label>
                    <input type="text" wire:model="password" name="password"  placeholder="Password">
                    <span class="password-show"><i class="icon-76"></i></span>
                    @error('password') <span class="error text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-group chekbox-area">
                    <div class="education-form-check">
                        <input type="checkbox" id="terms-condition">
                        <label for="terms-condition">I agree the User Agreement and <a href="terms-condition.html">Terms & Condition.</a> </label>
                    </div>
                </div>
              
                <div class="form-group">
                    <button wire:click.prevent="register()"  class="education-btn btn-medium">Create Account <i class="icon-4"></i></button>
                </div>
                <span class="text-danger">{!! Session::get('msg') !!}</span>
            </form>
        </div>
        @endif

        

</div>

