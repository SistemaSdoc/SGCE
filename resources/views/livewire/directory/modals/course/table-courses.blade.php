<div wire:ignore.self data-backdrop='static' class="modal fade" id="tablecourses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Cursos</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body" style='overflow-y:auto;'>
            <div class="mb-1 d-flex flex-wrap align-items-center">
                <div class="">
                    <button data-toggle="modal" data-target="#formcourse" id="btn-addcourse" class="btn btn-sm btn-primary" style='padding: 8px;'>
                        <i class="fa fa-plus"></i>
                        Adicionar
                    </button>
                </div>

                <div class="col-md-10">
                    <select wire:change='listofcourses' wire:model='schoolcourses' class="form-control">
                        <option value="">--Selecionar escola--</option>
                        @if (isset($listofschools) and count($listofschools) > 0)
                            @foreach ($listofschools as $school)
                                <option value="{{$school->id ?? ''}}">{{$school->schoolname ?? ''}}</option>
                            @endforeach

                        @endif
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="text-uppercase text-white" style='background-color:#5978d2; color:white;'>
                        <tr>
                            <th>Curso</th>
                            <th>Descrição</th>
                            <th>Duração</th>
                            <th>Escola</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($listofcourses) && count($listofcourses) > 0)
                            @foreach ($listofcourses as $course)
                                <tr>
                                    <td>{{$course->coursename ?? ''}}</td>
                                    <td>{{$course->coursedescription ?? ''}}</td>
                                    <td>{{$course->duration ?? ''}}</td>
                                    <td>{{$course->schoolname ?? ''}}</td>
                                    <td>
                                        <div class="d-flex  align-items-center" style='justify-content:space-evenly;'>
                                            <button wire:click='editcoursedata({{$course->courseid}})' data-toggle="modal" data-target="#formcourse" class="buttoneditcourse btn mx-1 btn-sm ">
                                            <img src="{{asset('/assets/img/edit.png')}}" alt="delete icon" width='28px' height='28px'>
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
