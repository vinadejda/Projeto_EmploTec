@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            <div class="card">
                <div class="card-header">{{ __('Mais Informações') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{route('cadastro-empresa')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>  
                        
                        <p >Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('CNPJ') }}
                            </label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="cnpj" required value="{{isset($info) ? $info->cd_cnpj : old('cnpj')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">
                                <span class="text-danger">*</span>{{ __('Razão Social') }}
                            </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control"  name="rz_social"  required value="{{isset($info) ? $info->ds_razao_social : old('rz_social')}}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
