<div>
                <!-- Sidebar -->
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('directory.home')}}">
    
                        <div class="h3">Certificados </div>
                    </a>
    
                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
    
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item ">
                        <a wire:ignore class="nav-link {{Route::currentrouteName() == 'directory.home' ? 'rounded bg-light text-dark' : ''}} " href="{{route('directory.home')}}">
                            <i class="{{Route::currentrouteName() == 'directory.home' ? 'text-dark' : ''}} fas fa-fw fa-home"></i>
                            <span>Início</span>
                        </a>
                    </li>
    
                    <li class="nav-item ">
                        <a wire:ignore class="nav-link {{Route::Current()->getName() == 'directory.students' ? 'rounded bg-light text-dark' : ''}}" href="{{route("directory.students")}}">
                            <i class="{{Route::Current()->getName() == 'directory.students' ? 'text-dark' : ''}} fas fa-fw fa-book-reader"></i>
                            <span>Alunos</span>
                        </a>
                    </li>
    
                    <li class="nav-item ">
                        <a wire:ignore class="nav-link {{Route::Current()->getName() == 'directory.notes' ? 'rounded bg-light text-dark' : ''}} " href="{{route('directory.notes')}}">
                            <i class="fas fa-fw fa-chart-bar {{Route::Current()->getName() == 'directory.notes' ? 'text-dark' : ''}}"></i>
                            <span>Lançamento de notas</span>
                        </a>
                    </li>
                    
    
                    <li class="nav-item ">
                        <a wire:ignore class="nav-link {{Route::Current()->getName() == 'directory.certifieds' ? 'rounded bg-light text-dark' : ''}}" href="{{route("directory.certifieds")}}">
                            
                            <i class="{{Route::Current()->getName() == 'directory.certifieds' ? 'text-dark' : ''}} fas fa-fw fa-file-alt"></i>
                            <span>Certificados</span>
                        </a>
                    </li>
    
    
                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">
    
                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="btn btn-light border-0" id="sidebarToggle"></button>
                    </div>
    
                    
    
                </ul>
                <!-- End of Sidebar -->
</div>
