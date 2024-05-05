<div wire:ignore.self data-backdrop='static' class="modal fade" id="formcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">{{!is_null($idcourseEdit) ? 'Editar curso' : 'Registar Curso'}} </h5>
            <button wire:click='closemodalCourse' class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="col-md-12">
                <div class="">
                    <form wire:submit='{{!is_null($idcourseEdit) ? 'updatecourse' : 'saveCourse'}} '>
                        <div class="form-group">
                            <select wire:model='courseofschool' class="form-control" >
                                <option value="">--Selecionar Escola--</option>
                                @if (isset($namesofschools) && count($namesofschools) > 0)
                                    @foreach ($namesofschools as $name)
                                        <option value="{{$name->id}}">{{$name->schoolname}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('courseofschool') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Curso</label>
                            <input wire:model='coursename' class="form-control" type="text" />
                            @error('coursename') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Duração</label>
                            <select wire:model='courseduration' class="form-control">
                                <option>--Selecionar--</option>
                                <option value="3 anos">3 anos</option>
                                <option value="4 anos">4 anos</option>
                                <option value="5 anos">5 anos</option>
                            </select>
                            @error('courseduration') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea wire:model='coursedescription' class="form-control"></textarea>
                            @error('coursedescription') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm {{!is_null($idcourseEdit) ? 'btn-dark':'btn-primary'}} ">{{!is_null($idcourseEdit) ? 'Atualizar' : 'Salvar'}} </button>
                        </div>
                    </form>

                </div>

            </div>



        </div>

    </div>
</div>
</div>
