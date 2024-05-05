<style>
  .container {
    text-align: center;
    border: 2px double black;
    height: 89%;
  }
  .content-wrapper {
    
    text-align: center;
  }

 .item {
     
    padding: 10px;
    margin: 5px;
  }

  #qrcode{
    margin-top:6rem;
  }

  #republicofAngolaDiv{
    text-transform: uppercase;
    text-align: center;
    margin-top: 3px;
  }


  #title{
    text-align: center;
     text-transform: uppercase;
     color: red;
     font-weight:bold;
  }

  #studentname{
    text-transform:uppercase;
    color:red;
  }

  table{
    
    width: 100%;
  }


  thead{
    text-align: left !important;
  }

  tr, td {
    border: 1px solid gray;
    text-align:center;
  }

#assignature{
    margin-top: 8rem;
}

hr{
  width: 15rem;
  margin-top:1.5rem;
  border: 1px solid gray;
}
thead {
  border: 1px solid gray;
}

</style>

<div class='container bg-danger'>
<div class="content-wrapper">

    <div id='republicofAngolaDiv'>
         <img width='50' src='https://www.conexaolusofona.org/wp-content/uploads/2019/04/simbolos-de-angola-2.jpg' /> 
        <h4>República de Angola</h4>
        <h4>Ministério da Educação</h4>
        <h4>Ensino Geral</h4>
    </div>

    <div id='title'>
    <h3>Certificado de Habilitações</h3>
    </div>


    
    <div class='item'>
    <p>a) {{auth()->user()->fullname}}, Director da Escola do II Ciclo do Ensino Secundário  nº3030 Ingombota, certifico que {{strtoupper($student->name)}} filho(a) de {{$student->fathername}} e de {{$student->mothername}}
    nascido aos {{$student->birthday}} natural de {{$student->province}} , município de {{$student->municipality}}
    portador do bilhete de identidade nº {{$student->number_bi}} concluiu nesta escola o II ciclo do Ensino secundário com o resultado de APROVADO
    </p>    


    <table>

        <thead>
        <th>Disciplina</th>
        <th>Nota 1º Semestre</th>
        <th>Nota 2º Semestre</th>
        <th>Nota 3º Semestre</th>
        <th>Média</th>
        <th>Curso</th>
        </thead>
        
        <tbody>
        @foreach($data as $note)
        <tr>
            <td>{{$note->disciplinename}}</td>      
            <td>{{$note->note1_quarter}}</td>      
            <td>{{$note->note1_quarter}}</td>      
            <td>{{$note->note1_quarter}}</td>      
            <td>{{$note->average}}</td>      
            <td>{{$note->coursename}}</td>      
        </tr>
        @endforeach
        </tbody>
    
    </table>

    <div id='assignature'>
        <p>O director</p>
        <span style='margin-top:2px'>{{auth()->user()->fullname}}</span>
        <hr />
    </div>

    
    </div>



    <!-- QR code-->
        <div id='qrcode' class='item '>
             <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size($sizeofQrcode)->generate($qrCodeLink)) !!} "> 
        </div>
    <!-- QR code-->

</div>


</div>
