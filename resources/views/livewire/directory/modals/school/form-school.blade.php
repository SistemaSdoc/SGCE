<div wire:ignore.self data-backdrop='static' class="modal fade" id="addschool" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{!is_null($idschoolEdit) ? 'Editar escola' : 'Registar Escola'}}</h5>
            <button wire:click='closemodalSchool' class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="col-md-12">
                <div class="">
                    <form wire:submit='{{!is_null($idschoolEdit) ? 'updateSchool' : 'saveSchool'}}'>
                        <div class="form-group">
                            <label for="">Nome da escola</label>
                            <input wire:model='schoolname' class="form-control" type="text" name=""  />
                            @error('schoolname') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">SIGLA</label>
                            <input wire:model='schoolinitials' class="form-control text-uppercase" type="text"  />
                            @error('schoolinitials') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Província</label>
                            <select wire:model='schoolprovince' class="form-control" type="text" name="" >
                                <option value="">--Selecionar--</option>
                                <option value="Luanda">Luanda</option>
                                <option value="Huambo">Huambo</option>
                                <option value="Benguela">Benguela</option>
                            </select>
                            @error('schoolprovince') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Município</label>
                            <input wire:model='schoolmunicipality' class="form-control" type="text"  />
                            @error('schoolmunicipality') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Endereço</label>
                            <input wire:model='schoollocation' class="form-control" type="text" name="" >
                            @error('schoollocation') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea wire:model='schooldescription' class="form-control" type="text" >
                            </textarea>
                            @error('schooldescription') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm {{!is_null($idschoolEdit) ? 'btn-dark':'btn-primary'}} ">{{!is_null($idschoolEdit) ? 'Atualizar' : 'Salvar'}} </button>
                        </div>
                    </form>

                </div>

            </div>



        </div>

    </div>
</div>
</div>
