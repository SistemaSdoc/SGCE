      <!-- Nav Item - User Information -->

                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{!is_null(auth()->user()->id) ? auth()->user()->fullname : ''}}</span>
                                        <img class="img-profile rounded-circle"
                                            src="{{url('/assets/img/undraw_profile.svg')}}">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <a  class="dropdown-item" href="{{route('user.account.details')}}" >
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Minha conta
                                        </a>
                                        

                                        <a wire:ignore data-target='#formuser' data-toggle="modal" class="{{ Route::Current()->GetName() == 'directory.home' || Route::Current()->GetName() == 'admin.home' ? 'd-block' : 'd-none'}}  dropdown-item">
                                            <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                                           Adicionar utilizador
                                        </a>
                                        

                                         <a wire:click='logout' class="dropdown-item" href="#">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Terminar sessão
                                        </a>
                                    </div>

                                   
                                </li>
                                
        <!-- Nav Item - User Information -->

