@extends('layouts.user.app')
@section('title', 'Certificado')

@section('content')
   
    @if (isset($data) && count($data) > 0)
    <div class='col-md-12 d-flex flex-column justify-content-center align-items-center'>
        <div class='d-flex flex-column align-items-center  text-uppercase my-3'>
            <img class='img-fluid' width='50' src='{{url('/assets/certified/insignia.png')}}' />
            <h6 class='h6'>Governo de Angola</h6>
            <h6 class='h6'>Ministério da Educação</h6>
            <h6 class='h6'>Ensino Geral<h6>
        </div>
        <div>
            <h2 class='text-success text-uppercase'>Certificado Válido Pertencente a:</h2>
        </div>

        <div class='my-4'>
            @foreach($data as $student)
                <h4 style='display:flex; width:500px;justify-content:space-between;'><span class='fw-bold'>Nome do Aluno:</span> {{$student->name}}</h4>
                <h4 style='display:flex; width:500px;justify-content:space-between;'><span class='fw-bold'>Data de nascimento:</span> {{\Carbon\Carbon::parse($student->birthday)->format('d-m-Y')}}</h4>
                <h4 style='display:flex;width:500px;justify-content:space-between;'><span class='fw-bold'>Número do BI:</span> {{$student->number_bi}}</h4>    
                <h4 style='display:flex;width:500px;justify-content:space-between;'><span class='fw-bold'>Nacionalidade:</span> {{$student->nationality}}</h4>    
                <h4 style='display:flex;width:500px;justify-content:space-between;'><span class='fw-bold'>Escola:</span> {{$student->schoolname}}</h4>    
                
            @endforeach
        </div>
    </div>
    @else
        <div class='text-center' style='margin-top:25vh'>
            <h3 class='text-danger'>Nenhum Resultado Encontrado!</h3>
        </div>
    @endif

@endsection

