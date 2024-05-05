<div wire:ignore.self data-backdrop='static' class="schools modal fade" id="tableschools" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-lg" role="document">
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Escolas</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="mb-1 d-flex flex-wrap align-items-center">
                <div class="">
                    <button data-toggle="modal" data-target="#addschool" id="btn-addschool" class="btn  btn-primary">
                        <i class="fa fa-plus"></i>
                        Adicionar
                    </button>
                </div>

                <div class="col-md-10">
                    <select wire:change='getSchools' wire:model='selectSchool' class="form-control" name="" id="">
                        <option value="">--Selecionar Escola--</option>
                        @if (isset($shoolsname) && count($shoolsname) > 0)
                            @foreach ($shoolsname as $name)
                                <option value="{{$name->schoolname ?? ''}}">{{$name->schoolname ?? ''}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead style='background-color:#5978d2; color:white;' class="text-uppercase text-white ">
                        <tr>
                            <th>Nome</th>
                            <th>Sigla</th>
                            <th>Província</th>
                            <th>Localização</th>
                            <th>Descrição</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($listofschools) && count($listofschools) > 0)
                            @foreach ($listofschools as $school)
                                <tr>
                                    <td>{{$school->schoolname ?? ''}}</td>
                                    <td>{{$school->initials ?? ''}}</td>
                                    <td>{{$school->province ?? ''}}</td>
                                    <td>{{$school->location ?? ''}}</td>
                                    <td>{{$school->description ?? ''}}</td>
                                    <td>
                                        <div class="d-flex  align-items-center" style='justify-content:space-evenly;'>
                                            <button wire:click='editschooldata({{$school->id}})' data-toggle="modal" data-target="#addschool" class="buttoneditschool btn mx-1 btn-sm ">
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
c
                        </tr>
                        @endif
                    </tbody>

                </table>
            </div>

        </div>

    </div>
</div>
</div>
