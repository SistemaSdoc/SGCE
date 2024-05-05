<div wire:ignore.self data-backdrop='static' class="modal fade" id="formstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">{{!is_null($idstudentEdit) ? 'Editar dados do Aluno' : 'Registar Aluno'}}</h5>
            <button wire:click='buttonclosemodalstudent' class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        
        <div class="modal-body">

            <div class="col-md-12">
                <div class="">
                    <form wire:submit='{{!is_null($idstudentEdit) ? 'updatestudent' : 'saveStudent' }}'>
    
                    <div class="d-flex align-items-start flex-wrap">
                        
                    <!--First column-->  
                        <div class="col-md-6 ">

                        <div class="form-group">
                            <label for="">Nome completo do aluno</label>
                            <input required wire:model='studentname' class="form-control" type="text"  />
                            @error('studentname') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        
                        <div class="form-group">
                        <label class="form-label">Escola</label>
                            <select required wire:model='studentschool' class="form-control">
                                <option value="">--Selecionar Escola--</option>
                                @if (isset($schoolnames) && count($schoolnames) > 0)
                                    @foreach ($schoolnames as $name)
                                        <option value="{{$name->id ?? ''}}">{{$name->schoolname ?? ''}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('studentschool') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                         <div class="form-group">
                        <label class="form-label">Curso</label>
                            <select required wire:model='studentcourse' class="form-control">
                        <option value="">--Selecionar curso--</option>
                        @if (isset($listofcourses) and count($listofcourses) > 0)
                            @foreach ($listofcourses as $course)
                                <option value="{{$course->courseid ?? ''}}">{{$course->coursename ?? ''}}</option>
                            @endforeach
                        @endif
                       </select>
                            @error('studentcourse') <span class="text-danger">{{$message}}</span>@enderror
                        </div>                       


                        <div class="form-group">
                            <label for="">Data de nascimento</label>
                            <input wire:model='studentbirthday' class="form-control" type="date"  />
                            @error('studentbirthday') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Número do BI</label>
                            <input required wire:model='studentnumberbi' class="form-control" type="text" />
                            @error('studentnumberbi') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Província</label>
                            <select required wire:model='studentprovince' class="form-control" type="text" >
                                <option value="">--Selecionar--</option>
                                <option value="Luanda">Luanda</option>
                                <option value="Huambo">Huambo</option>
                                <option value="Benguela">Benguela</option>
                            </select>
                            @error('studentprovince') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Município</label>
                            <input required wire:model='studentmunicipality' class="form-control" type="text" />
                            @error('studentmunicipality') <span class="text-danger">{{$message}}</span>@enderror
                        </div>


                        </div>


                    <!--Second column-->  
                        <div class="col-md-6">
                       

                        <div class="form-group">
                            <label for="">Nacionalidade</label>
                            <select required wire:model='studentnationality' class="form-control">
                                <option>-Selecionar--</option>
                                <option value="Angolano">Angolano</option>                            
                                <option value="Portugês">Portugês</option>                            
                                <option value="Brasileiro">Brasileiro</option>                            
                            </select>
                            @error('studentnationality') <span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">Endereço</label>
                            <input required wire:model='studentaddress' class="form-control" type="text" />
                            @error('studentaddress') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Nome do Pai</label>
                            <input required wire:model='studentfathername' class="form-control" type="text" />
                            @error('studentfathername') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Nome da Mãe</label>
                            <input wire:model='studentmothername' class="form-control" type="text" />
                            @error('studentmothername') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input required wire:model='studentemail' class="form-control" type="email" />
                            @error('studentemail') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Telefone</label>
                            <input required wire:model='phonenumberstudent' class="form-control" type="text" />
                            @error('phonenumberstudent') <span class="text-danger">{{$message}}</span>@enderror
                        </div>

                        </div>                    
                    </div>                    


                        <div class="mx-2">
                            <button type="submit" class="btn btn-sm {{!is_null($idstudentEdit) ? 'btn-dark':'btn-primary'}} ">{{!is_null($idstudentEdit) ? 'Atualizar' : 'Salvar'}} </button>
                        </div>
                    </form>

                </div>

            </div>



        </div>

    </div>
</div>
</div>
