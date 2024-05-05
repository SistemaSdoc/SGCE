@section('title', 'Notas')
 <div>
    <div id="wrapper">

     <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('directory.home')}}">

                    <div class="h3">Certificados </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item ">
                    <a wire:ignore class="nav-link {{Route::CurrentrouteName() == 'directory.home' ? 'rounded bg-light text-dark' : ''}} " href="{{route('directory.home')}}">
                        <i class="{{Route::currentrouteName() == 'directory.home' ? 'text-dark' : ''}} fas fa-fw fa-home"></i>
                        <span>Início</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a wire:ignore class="nav-link {{Route::Current()->getName() == 'directory.notes' ? 'rounded bg-light text-dark' : ''}} " href="{{route('directory.notes')}}">
                        <i class="fas fa-fw fa-chart-bar {{Route::Current()->getName() == 'directory.notes' ? 'text-dark' : ''}}"></i>
                        <span>Lançamento de notas</span>
                    </a>
                </li>




                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="btn btn-light border-0" id="sidebarToggle"></button>
                </div>

                
        </ul>
    <!-- End of Sidebar -->  


               <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                 <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <!-- Topbar Search -->
                            <form
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-sm-none">
                                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-search fa-fw"></i>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                        aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto w-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small"
                                                    placeholder="Search for..." aria-label="Search"
                                                    aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>

                                <!-- Nav Item - Alerts -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-bell fa-fw"></i>
                                        <!-- Counter - Alerts -->
                                        <span class="badge badge-danger badge-counter">3+</span>
                                    </a>
                                    <!-- Dropdown - Alerts -->
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="alertsDropdown">
                                        <h6 class="dropdown-header">
                                            Alerts Center
                                        </h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 12, 2019</div>
                                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-success">
                                                    <i class="fas fa-donate text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 7, 2019</div>
                                                $290.29 has been deposited into your account!
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-warning">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 2, 2019</div>
                                                Spending Alert: We've noticed unusually high spending for your account.
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </li>

                                <!-- Nav Item - Messages -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-envelope fa-fw"></i>
                                        <!-- Counter - Messages -->
                                        <span class="badge badge-danger badge-counter">7</span>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="messagesDropdown">
                                        <h6 class="dropdown-header">
                                            Message Center
                                        </h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                                    alt="...">
                                                <div class="status-indicator bg-success"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                                    problem I've been having.</div>
                                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                                    alt="...">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div>
                                                <div class="text-truncate">I have the photos that you ordered last month, how
                                                    would you like them sent to you?</div>
                                                <div class="small text-gray-500">Jae Chun · 1d</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                                    alt="...">
                                                <div class="status-indicator bg-warning"></div>
                                            </div>
                                            <div>
                                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                                    the progress so far, keep up the good work!</div>
                                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                                    alt="...">
                                                <div class="status-indicator bg-success"></div>
                                            </div>
                                            <div>
                                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                                    told me that people say this to all dogs, even if they aren't good...</div>
                                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                                    </div>
                                </li>

                                <div class="topbar-divider d-none d-sm-block"></div>
                            
                                 @auth
                                    @include('livewire.includes.user-account')
                                @endauth

                            </ul>

                        </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                                </div>


                             <!-- Content Row -->
                                <div class="row">
                                     <div class="col-md-12">
                                            <div class="card shadow">

                                                <div class="card-header">
                                                    <h2>Notas</h2>
                                                </div>

                                                <div class="card-body">

                                                    <div class='row mb-3'>
                                                        
                                                        <div class="col-md-12 flex-wrap d-flex align-items-center ">
                                                            
                                                            <div class='col-md-4 d-flex align-items-center'>
                                                                <input wire:model.live="studentnumberbi" class='form-control' placeholder='Número do Bilhete de Identidade' />
                                                               
                                                            </div>
                                                            
                                                            <div class="col-md-4 d-flex ">
                                                            <input wire:model.live='searchStudent' placeholder='Pesquisar nome do aluno... ' type="text" class="form-control" />
                                                            <button class="btn btn-primary" style='margin-left: -3px;border-radius: 0 5px 5px 0;' >
                                                            <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>  

                                                        <div class="col-md-3">
                                                            <select wire:change="getNotesOfStudents" wire:model="courseofstudent" class='form-control'>
                                                                <option value="">--Selecionar curso--</option>
                                                                @if (isset($allcourses) && count($allcourses) > 0)
                                                                    @foreach($allcourses as $course)
                                                                        <option value="{{$course->id}}">{{$course->coursename}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>                


                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered">
                                                                 
                    <thead class="text-uppercase text-white" style='background-color:#5978d2; color:white;'>
                                                                    <tr>
                                                                        <th>Nome</th>
                                                                        <th>Curso</th>
                                                                        <th>Disciplina</th>
                                                                        <th>1ª Nota</th>
                                                                        <th>2ª Nota</th>
                                                                        <th>3ª Nota</th>
                                                                        <th>Média</th>
                                                                        <th>Opções</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @if(isset($allstudentnotes) && count($allstudentnotes) > 0)
                                                                        @foreach($allstudentnotes as $key => $note)
                                                                            <tr>
                                                                                <td>{{$note->name}}</td>
                                                                                <td>{{$note->coursename}}</td>
                                                                                <td>{{$note->disciplinename}}</td>
                                                                                <td>
                                                                                    @if(is_null($note->note1_quarter))
                                                                                        <input  wire:model='firstquarterNote.{{$key}}' required placeholder="0.00" type="number" class="col-md-9 form-control text-center container" />
                                                                                    @else
                                                                                        <p class='text-center {{$note->note1_quarter <10 ? "text-danger" : "text-primary"}}'>{{$note->note1_quarter}}</p>
                                                                                    @endif
                                                                                </td>

                                                                                <td>
                                                                                    @if(is_null($note->note2_quarter))
                                                                                            <input  wire:model='secondquarterNote.{{$key}}' required placeholder="0.00" type="number" class="col-md-9 form-control text-center container" />
                                                                                        @else
                                                                                        <p class='text-center {{$note->note2_quarter <10 ? "text-danger" : "text-primary"}}'>{{$note->note2_quarter}}</p>
                                                                                    @endif

                                                                                </td>

                                                                                <td>

                                                                                    @if(is_null($note->note3_quarter))
                                                                                                <input  wire:model='thirdquarterNote.{{$key}}' required placeholder="0.00" type="number" class="col-md-9 form-control text-center container" />
                                                                                            @else
                                                                                        <p class='text-center {{$note->note3_quarter <10 ? "text-danger" : "text-primary"}}'>{{$note->note3_quarter}}</p>
                                                                                    @endif

                                                                                
                                                                                </td>
                                                                                <td>
                                                                                    <p class='text-center {{is_null($note->average) ? 'text-dark' : ''}} {{$note->average <10 ? "text-danger" : "text-primary"}}'>{{is_null($note->average) ? 'N/C' : $note->average}}</p>
                                                                                </td>
                                                                                <td>
                                                                                <div class="d-flex">

                                                                                    @if(is_null($note->note3_quarter))
                                                                                        <button  wire:click='lauchstudentnotes({{$note->noteid}})' class="{{!is_null($note->note3_quarter) ? 'disabled' : ''}} btn btn-sm btn-primary btn sm">
                                                                                        Salvar
                                                                                        </button>
                                                                                    @else
                                                                                        <button class="{{!is_null($note->note3_quarter) ? 'disabled' : ''}} btn btn-sm btn-primary btn sm">
                                                                                        Salvar
                                                                                        </button>

                                                                                    @endif


                                                                                    
                                                                                </div>
                                                                            </td>
                                                                            </tr>
                                                                        @endforeach
                                                                            @else
                                                                             <tr>
                                                                                <td colspan="9" >
                                                                                    <div class="col-md-12 alert alert-warning rounded text-center ">
                                                                                        Nenhum resultado encontrado
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                    @endif
                                                                </tbody>

                                                            </table>

                                                        </div>

                                                    </div>

                                                </div>


                                            </div>

                                     </div>

                                </div>



                             <!-- End Content Row -->




                        </div>
                    <!-- End  Page Content -->

                </div>
                 <!-- End Main Content -->

                 
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->


            </div> 
               <!-- End Content Wrapper -->
            
    </div>

    <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div wire:ignore.self data-backdrop='static' class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a wire:click='logout' class="btn btn-primary" >Logout</a>
                    </div>
                </div>
            </div>
        </div>



</div>




