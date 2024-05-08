@section('title', 'Directoria')
<div>
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!--SideBar component -->
            <livewire:directory.component.side-bar-component />
           

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                        <livewire:directory.component.top-bar-component>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                             <div  class="col-xl-3 col-md-6 mb-4">
                             <a style="text-decoration:none !important" href='{{route('directory.students')}}'>
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                    Alunos</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{isset($studentsquantity) ? $studentsquantity : ''}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <img src='{{asset("/assets/img/education.png")}}' alt='students'/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </a>

                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a style="text-decoration:none !important" href="{{route("directory.certifieds")}}">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                        Certificados</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{isset($certifiedquantity) ? $certifiedquantity : ''}}</div>
                                                </div>
                                                <div class="col-auto">
                                                <img src='{{asset("/assets/img/certificate.png")}}' alt='students'/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div data-toggle="modal" data-target="#tabledisciplines" class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                    Disciplinas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                            <img src='{{asset("/assets/img/books-stack-of-three.png")}}' alt='students'/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div data-toggle='modal' data-target="#tablecourses" class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                    Cursos</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{isset($coursesquantity) ? $coursesquantity : ''}}</div>
                                            </div>
                                            <div class="col-auto">
                                            <img src='{{asset("/assets/img/open-book.png")}}' alt='students'/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- School component-->
                            <livewire:directory.component.school-component />

                            <!-- Earnings (Monthly) Card Example -->
                            <div  class="cursor-pointer col-xl-3 col-md-6 mb-4">
                            <a style="text-decoration:none !important" href="{{route("directory.notes")}}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                                    Lançamento de Notas</div>
                                            </div>
                                            <div class="col-auto">
                                            <img src='{{asset("/assets/img/book.png")}}' alt='students'/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            </div>

                        </div>

                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div wire:ignore class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div wire:ignore class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-primary"></i> Direct
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success"></i> Social
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-info"></i> Referral
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

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
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

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
                    <div class="modal-body">Deseja realmente terminar a sua sessão?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a  class="btn btn-primary" ">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schools Modal -->
        @include('livewire.directory.modals.school.table-schools')
        @include('livewire.directory.modals.school.form-school')

 
        <!-- Courses Modal -->
        @include('livewire.directory.modals.course.form-course')
        @include('livewire.directory.modals.course.table-courses')

        <!-- Disciplines Modal -->
        @include('livewire.directory.modals.discipline.form-discipline')
        @include('livewire.directory.modals.discipline.table-disciplines')

        <!-- User Modal -->
        @include('livewire.directory.modals.user.form-user')


</div>

 @push('home-directory')
 <script>
    $(document).ready( (fn) =>{
       $('#btn-addschool').click(()=>{
            $('#tableschools').modal('hide');
       });
 

       $('#btn-addcourse').click(()=>{
            $('#tablecourses').modal('hide');
       });

       $('#btn-addiscipline').click(()=>{
            $('#tabledisciplines').modal('hide');
       });

       $('.buttoneditstudent').click(()=>{
            $('#tablestudents').modal('hide');
       });

       $('.button-editdisciplin').click(()=>{
            $('#tabledisciplines').modal('hide');
       });

       $('.buttoneditcourse').click(()=>{
            $('#tablecourses').modal('hide');
       });

       $('.buttoneditschool').click(()=>{
            $('#tableschools').modal('hide');
       });

    });
 </script>

 @endpush
