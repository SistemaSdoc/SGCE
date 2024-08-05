@section('title', 'Alunos')
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
                                                    <h2>Alunos</h2>
                                                </div>

                                                <div class="card-body">

                                                    

                                                    <div class="row">
                                                        <div class="mb-1 d-flex flex-wrap col-md-12 align-items-center">
                                                           
                                                           <div class="">
                                                                <button data-toggle="modal" data-target="#formstudent" id="btn-addstudent" class="btn  btn-primary">
                                                                    <i class="fa fa-plus"></i>
                                                                    Adicionar
                                                                </button>
                                                            </div>

                                                            <div class="col-md-10">
                                                                <input placeholder="Digite o nome do aluno..." wire:model.live='searchStudent' class="form-control"/>
                                                            </div>

                                                            

                                                           
                                                        </div>
                                                        
                                                         <div class="table-responsive">
                                                            <table class="table table-bordered table-hover table-striped">
                                                            <thead style='background-color:#5978d2; color:white;' class="text-uppercase text-white ">
                                                                    <tr>
                                                                        <th>Nome</th>
                                                                        <th>Data</th>
                                                                        <th>Nº_BI</th>
                                                                        <th>Província</th>
                                                                        <th>Município</th>
                                                                        <th>Endereço</th>
                                                                        <th>Email</th>
                                                                        <th>Telefone</th>                                                                         <th>Curso</th>
                                                                        <th>Opções</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class='text-center'>
                                                                    @if(isset($listofstudents) and count($listofstudents) > 0)
                                                                        @foreach ($listofstudents as $studentpersonaldata)
                                                                            <tr>
                                                                                <td>{{$studentpersonaldata->name ?? ''}}</td>
                                                                                <td>{{$studentpersonaldata->birthday ?? ''}}</td>
                                                                                <td>{{$studentpersonaldata->number_bi ?? ''}}</td>
                                                                                <td>{{$studentpersonaldata->province ?? ''}}</td>
                                                                                <td>{{$studentpersonaldata->municipality ?? ''}}</td>
                                                                                <td>{{$studentpersonaldata->address ?? ''}}</td>
                                                                                <td>{{$studentpersonaldata->email ?? ''}}</td>
                                                                                <td>{{$studentpersonaldata->phonenumber ?? ''}}</td>                                                                                
                                                                                <td>{{$studentpersonaldata->coursename ?? ''}}</td>
                                                                                <td>
                                                                                <div class="d-flex  align-items-center" style='justify-content:space-evenly;'>
                                                                                        
                                                                                        <button class='btn btn-sm' title="Ver mais detalhes">
                                                                                            <i class='fa fa-2x fa-info-circle text-dark'></i>
                                                                                        </button>

                                                                                        <button wire:click='editstudentdata({{$studentpersonaldata->id_student}})' id='buttoneditstudent' data-toggle="modal" data-target="#formstudent" class="buttoneditstudent btn mx-1 btn-sm ">
                                                                                        <img  src="{{asset('/assets/img/edit.png')}}" alt="delete icon" width='28px' height='28px'>
                                                                                        </button>

                                                                                        <button class="disabled btn btn-sm ">
                                                                                        <img src="{{asset('/assets/img/bin.png')}}" alt="delete icon" width='28px' height='28px'>
                                                                                        </button>

                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                    <tr>
                                                                        <td colspan="15" >
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

               <!-- Students Modal -->
        @include('livewire.directory.modals.student.form-student')



</div>

@push('student')
<script>

</script>
@endpush




