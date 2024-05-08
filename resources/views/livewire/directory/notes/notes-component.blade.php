@section('title', 'Notas')
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




