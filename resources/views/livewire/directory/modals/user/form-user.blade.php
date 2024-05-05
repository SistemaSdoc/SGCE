<div wire:ignore.self data-backdrop='static' class="modal fade" id="formuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
        <div class="modal-header">
            <h5>Adicionar utilizador</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        
        <div class="modal-body">

            <div class="col-md-12">
                <div class="">
                    <form wire:submit='saveUser'>
    
                    <div class="d-flex align-items-start flex-wrap">
                   
                        <div class="col-md-12">

                       

                        <div class="form-group">
                            <label for="">Nome</label>
                            <input required wire:model='username' class="form-control" type="text"  required />
                            @error('username') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                   
                        <div class="form-group">
                            <label for="">Nome da Mãe</label>
                            <input wire:model='userbirthday' class="form-control" type="date"  required />
                            @error('userbirthday') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input required wire:model='useremail' class="form-control" type="email"  required />
                            @error('useremail') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Telefone</label>
                            <input required wire:model='userphone' class="form-control" type="tel"  required />
                            @error('userphone') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Senha</label>
                            <input required wire:model='userpassword' class="form-control" type="text" required  />
                            @error('userpassword') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        </div>                    
                    </div>                    


                        <div class="mx-2">
                        <button class='btn btn-primary'>Salvar</button>
                        </div>
                    </form>

                </div>

            </div>



        </div>

    </div>
</div>
</div>
