
  
<div data-target='{{auth()->user()->profile != 'admin' ? '#tableschools' : ''}}' data-toggle="modal" class="cursor-pointer col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                        Escolas</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{isset($schoolsquantity) ? $schoolsquantity : ''}}</div>
                </div>
                <div class="col-auto">
                <img src='{{asset("/assets/img/school.png")}}' alt='students'/>
                 </div>
            </div>
         </div>
    </div>
                            
</div>

