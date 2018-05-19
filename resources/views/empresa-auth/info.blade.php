@extends('layouts.app')

@section('content')
  <section style="margin-top: -8% !important; margin-bottom: -7.9% !important; margin: 0 auto; width: 600px;">
    <h1 style="color: #000; font-size: 2.8em; font-weight: 300;">{{ __('Mais Informações') }}</h1>
    <p>Campos com <span class="text-danger">*</span> são de preenchimento obrigatório</p>
                    
        <form method="POST" action="{{route('cadastro-empresa')}}">
            <fieldset>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>              
                <div div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="cnpj">
                            <span class="text-danger">*</span>{{ __('CNPJ') }}
                        </label>
                        <input  type="text" class="form-control" name="cd_cnpj" required value="{{isset($info) ? $info->cd_cnpj : old('cd_cnpj')}}" id="cnpj"  maxlength="14" pattern="/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/" title="00.000.000/0000-00" class="form-control{{ $errors->has('cd_cpf') ? ' is-invalid' : '' }}" placeholder="Digite o CNPJ da Empresa">
                            @if ($errors->has('cd_cnpj'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('cd_cnpj') }}</strong>
                              </span>
                            @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="rz_social">
                            <span class="text-danger">*</span>{{ __('Razão Social') }}
                        </label>
                        <input type="text" class="form-control"  name="rz_social" maxlength="45" placeholder="Digite a Razão Social da Empresa" pattern="[a-zA-ZÀ-úçÇ0-9\s]+" required value="{{ old('rz_social') }}"  oninvalid="setCustomValidity('Somente Letras e Números!')" onchange="try{setCustomValidity('')}catch(e){}" title="Somente Letras e Números!">
                            @if ($errors->has('rz_social'))
                              <span class="invalid-feedback">
                                <strong>{{ $errors->first('rz_social') }}</strong>
                              </span>
                            @endif
                    </div>
                </div>
            </fieldset>
            <div class="form-row" style="justify-content: center;">
                <div class="form-group col-md-6">
                <button type="submit" class="btn btn-success" style="justify-content: center;">{{ __('Cadastrar') }}</button>
                <button type="reset" class="btn btn-warning">{{ __('Limpar') }}</button>
                <a href="{{ url('/') }}" class="btn btn-danger">{{ __('Cancelar') }}</a>
            </div>
            </form>
</section>
@endsection
