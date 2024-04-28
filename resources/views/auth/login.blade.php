{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>


            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


<x-login-layout>
    <div class="login-img">
        <div id="global-loader"></div>
        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row authentication">
                        <div class="col col-login mx-auto">
                            <div class="text-center mb-6">

                                <h2 class="display-3 text-light">Finflex</h2>
                            </div>
                            <form name="frm-login" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="card-body p-6 ">
                                    <div class="card-title text-center" style="color: #fff;">Login to your account</div>
                                    <div class="input-icon form-group wrap-input">
                                        <span class="input-icon-addon search-icon">
                                            <i class="mdi mdi-account"></i>
                                        </span>
                                        <input type="email" id="frm-login-uname" name="email"
                                            placeholder="Type your email address" :value="old('email')" required
                                            autofocus class="form-control">
                                    </div>
                                    <div class="input-icon form-group wrap-input">
                                        <span class="input-icon-addon search-icon">
                                            <i class="zmdi zmdi-lock"></i>
                                        </span>
                                        <input type="password" class="form-control mb-0" id="frm-login-pass"
                                            name="password" placeholder="************" required
                                            autocomplete="current-password">
                                        <label class="form-label">
                                            <a href="{{ route('password.request') }}" class="float-right small">I
                                                forgot password</a>
                                        </label>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary btn-block" value="Login"
                                            name="submit">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-login-layout>
