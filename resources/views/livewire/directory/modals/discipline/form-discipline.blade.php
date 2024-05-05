<div wire:ignore.self data-backdrop='static' class="modal fade" id="formdiscipline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">{{!is_null($iddisciplineEdit) ? 'Editar disciplina' : 'Registar disciplina'}}</h5>
            <button wire:click='closemodaldiscipline' class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="col-md-12">
                <div class="">
                    <form wire:submit='{{!is_null($iddisciplineEdit) ? 'updateDiscipline' : 'saveDiscipline'}}'>
                        <div class="form-group">
                        <label>Curso</label>
                            <select wire:model='courseofdiscipline' class="form-control" >
                                <option value="">--Selecionar Curso--</option>
                                @if (isset($listofcourses) and count($listofcourses) > 0)
                                @foreach ($listofcourses as $course)
                                    <option value="{{$course->courseid ?? ''}}">{{$course->coursename ?? ''}}</option>
                                @endforeach

                            @endif
                            </select>
                            @error('courseofdiscipline') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Disciplina</label>
                            <input wire:model='disciplinename' class="form-control" type="text" />
                            @error('disciplinename') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea wire:model='disciplinedescription' class="form-control"></textarea>
                            @error('disciplinedescription') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm {{!is_null($iddisciplineEdit) ? 'btn-dark':'btn-primary'}} ">{{!is_null($iddisciplineEdit) ? 'Atualizar' : 'Salvar'}} </button>
                        </div>
                    </form>

                </div>

            </div>



        </div>

    </div>
</div>
</div>
