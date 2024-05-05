<div wire:ignore.self data-backdrop='static' class="modal fade" id="tabledisciplines" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Disciplinas</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="mb-1 d-flex flex-wrap align-items-center" style='justify-content:space-between;'>
                <div class="">
                    <button data-toggle="modal" data-target="#formdiscipline" id="btn-addiscipline" class="button-editdisciplin btn-sm btn btn-primary" style='padding: 8px;'>
                        <i class="fa fa-plus"></i>
                        Adicionar
                    </button>
                </div>

                <div class="col-md-10">
                    <select wire:change='listofcourses' wire:model='course' class="form-control">
                        <option value="">--Selecionar curso--</option>
                        @if (isset($listofcourses) and count($listofcourses) > 0)
                            @foreach ($listofcourses as $course)
                                <option value="{{$course->courseid ?? ''}}">{{$course->coursename ?? ''}}</option>
                            @endforeach

                        @endif
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="text-uppercase text-white" style='background-color:#5978d2; color:white;'>
                        <tr>
                            <th>Disciplina</th>
                            <th>Curso</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($listofdisciplines) && count($listofdisciplines) > 0)
                            @foreach ($listofdisciplines as $discipline)
                                <tr>
                                    <td>{{$discipline->disciplinename ?? ''}}</td>
                                    <td>{{$discipline->coursename ?? ''}}</td>
                                    <td>
                                        <div class="d-flex  align-items-center" style='justify-content:space-evenly;'>
                                            <button wire:click='editdisciplinedata({{$discipline->coursedisciplineid}})' id='button-editdisciplin' data-toggle="modal" data-target="#formdiscipline" class="button-editdisciplin btn mx-1 btn-sm ">
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
