@section('title', 'Login')
<div>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 25vh !important">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                    </div>
                                    <form wire:submit='authenticate' class="user">
                                        <div class="form-group">
                                            <input wire:model='email' type="email" class="form-control "
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Digite o seu endereço de email..." />
                                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <input wire:model='password' type="password" class="form-control "
                                                id="exampleInputPassword" placeholder="Digite a sua senha...">
                                                @error('password')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            {{-- <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Lembrar-me
                                                    Me</label>
                                            </div> --}}
                                        </div>
                                        <button type="submit" href="index.html" class="btn btn-primary btn-block ">
                                            Entrar
                                        </button>
                                        {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a> --}}

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="#">Esqueceu a palavra-passe?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

