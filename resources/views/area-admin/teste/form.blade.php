@extends('area-admin.layout.template')

@section('content')

  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="container-fluid caixa-areaTIs ">
  

      <div class="card-body">
        <form role="form" method="post" action="{{ '/empresa/areaTIs/adiciona'}}">
          <fieldset>
            <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatorio</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            
            <h2> Questão</h2>
            <hr>
            <div class="form-group col-md-6">
              <label for="nome">
                <span class="text-danger">*</span> Area
              </label>
              <select name="alternativa">
                <option value="{{ $areasTI->cd_areaTI }}">{{ $areasTI->nm_areaTI }}</option>
                
              </select>
             

@endsection