@section('title', 'Certificados')
 <div>
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
                                     <div class="col-md-12">
                                            <div class="card shadow">

                                                <div class="card-header">
                                                    <h2>Notas</h2>
                                                </div>

                                                <div class="card-body">

                                                    <div class='row mb-3'>
                                                        
                                                        <div class="col-md-12 flex-wrap d-flex align-items-center ">
                                                            
                                                            {{-- <div class='col-md-4 d-flex align-items-center'>
                                                                <input wire:model.live="studentnumberbi" class='form-control' placeholder='Número do Bilhete de Identidade' />
                                                               
                                                            </div> --}}
                                                            
                                                            <div class="col-md-9 d-flex ">
                                                            <input wire:model.live='searchStudent' placeholder='Pesquisar nome do aluno... ' type="text" class="form-control" />
                                                            <button class="btn btn-primary" style='margin-left: -3px;border-radius: 0 5px 5px 0;'>
                                                            <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>  

                                                        <div class="col-md-3">
                                                            <select wire:change="getStudents" wire:model="courseofstudent" class='form-control'>
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
                                                            <table class="table table-striped">
                                                                 
                                                             <thead style='background-color:#5978d2; color:white;' class="text-uppercase text-white ">
                                                                    <tr>
                                                                        <th>Nome</th>
                                                                        <th>Curso</th>                                                                      
                                                                        <th>Opções</th>
                                                                    </tr>
                                                                </thead>

                                                                    <tbody>
                                                                            @if(isset($listofstudents) and count($listofstudents) > 0)
                                                                                @foreach ($listofstudents as $studentpersonaldata)
                                                                                <tr>
                                                                                    <td>
                                                                                    <div class='d-flex align-items-center'>
                                                                                    <img src="{{asset('/assets/img/pdf-file.png')}}" alt="delete icon" width='30px' height='30px'>
                                                                                    {{$studentpersonaldata->name ?? ''}}                                                                                    
                                                                                    </div>

                                                                                   
                                        
                                                                                    <td>{{$studentpersonaldata->coursename ?? ''}}</td>
                                                                                    <td>
                                                                                        <div class="d-flex  align-items-center">
                                                                                             <button wire:click="printcertified({{$studentpersonaldata->studentid}})" class="btn mx-1 btn-sm btn-primary">
                                                                                                 imprimir
                                                                                             </button>

                                                                                           
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




