<div>
    <div class="modal-dialog">
        @if ($status == false)
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login to Continue
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <section class="account-page-area section-gap-equal">
                        <div class="container position-relative" style="margin-top: -80px">
                            <div class="row g-5 justify-content-center">
                                <div class="col-lg-12">
                                    <div class="login-form-box">
                                        <h3 class="title">Sign in</h3>
                                        <p>Don’t have an account? <a wire:click.prevent="status()">Sign up</a></p>
                                        <form wire:submit.prevent="saveUser">

                                            <div class="form-group">
                                                <label for="current-log-email">UserContact</label>
                                                <input type="text" wire:model="contact"
                                                    placeholder="Enter User Contact">
                                                @error('contact')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="current-log-password">Password</label>
                                                <input type="text" wire:model="password"
                                                    placeholder="Enter User Password">
                                                <span class="password-show"><i class="icon-76"></i></span>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                            <div class="form-group chekbox-area">
                                                <div class="education-form-check">
                                                    <input type="checkbox" id="remember-me">
                                                    <label for="remember-me">Remember Me</label>
                                                </div>
                                                <a href="#" class="password-reset">Lost your password?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="education-btn btn-medium">Sign in <i
                                                        class="icon-4"></i></button>
                                            </div>
                                           <label for="" class="text-danger">
                                            {!! Session::get('msg') !!}
                                           </label>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>
                </div>
            </div>
        @else
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login to Continue
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="account-page-area section-gap-equal">
                        <div class="container position-relative" style="margin-top: -80px">
                            <div class="row g-5 justify-content-center">

                                <div class="col-lg-12">
                                    <div class="login-form-box registration-form">
                                        <h3 class="title">Registration</h3>
                                        <p>Already have an account? <a wire:click.prevent="status()">Sign in</a></p>
                                        <form wire:submit.prevent="register()">
                                            @csrf
                                            <div class="form-group">
                                                <label for="reg-name">Name</label>
                                                <input type="text"  wire:model="name"
                                                    placeholder="Full name">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="log-email">UserEmail</label>
                                                <input type="text" wire:model="email" 
                                                    placeholder="Email or username">
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="log-email">UserContact</label>
                                                <input type="text"  wire:model="contact"
                                                    placeholder="Email or username">
                                                    @error('contact')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="log-password">Password</label>
                                                <input type="text" wire:model="password" 
                                                    placeholder="Password">

                                                <span class="password-show"><i class="icon-76"></i></span>
                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                            <div class="form-group chekbox-area">
                                                <div class="education-form-check">
                                                    <input type="checkbox" id="terms-condition">
                                                    <label for="terms-condition">I agree the User Agreement and <a
                                                            href="terms-condition.html">Terms & Condition.</a> </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="education-btn btn-medium">Create Account
                                                    <i class="icon-4"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        @endif
    </div>
</div>
