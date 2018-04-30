@extends('layouts.app')


@section('content')
    <div style="margin-top: 80px" class="container">
        <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('CURRICULO') }}</div>

                <div class="card-body">
                    <form method="POST" action="/curriculo/adicionarcurriculo">
                      
                        
{{ csrf_field() }}
                        <div class="form-group row">
                            <label for="objetivo" class="col-md-4 col-form-label text-md-right">{{ __('Objetivo Profissional') }}</label>

                            <div class="col-md-6">
                                <input id="objetivo" type="text" class="form-control" name="objetivo" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="prentencaoSalarial" class="col-md-4 col-form-label text-md-right">{{ __('prentencaoSalarial') }}</label>

                            <div class="col-md-6">
                                <input id="prentencaoSalarial" type="text" class="form-control" name="prentencaoSalarial" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experiencia" class="col-md-4 col-form-label text-md-right">{{ __('experiencia') }}</label>

                            <div class="col-md-6">
                                <input id="experiencia" type="text" class="form-control" name="experiencia" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="formacao" class="col-md-4 col-form-label text-md-right">{{ __('formacao') }}</label>

                            <div class="col-md-6">
                                <input id="formacao" type="text" class="form-control" name="formacao" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="info" class="col-md-4 col-form-label text-md-right">{{ __('info') }}</label>

                            <div class="col-md-6">
                                <input id="info" type="text" class="form-control" name="info" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nmIdioma" class="col-md-4 col-form-label text-md-right">{{ __('nmIdioma') }}</label>

                            <div class="col-md-6">
                                <input id="nmIdioma" type="text" class="form-control" name="nmIdioma" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nmIdioma" class="col-md-4 col-form-label text-md-right">{{ __('nmIdioma') }}</label>

                            <div class="col-md-6">
                                <input id="nmIdioma" type="text" class="form-control" name="nmIdioma" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="nlIdioma" class="col-md-4 col-form-label text-md-right">{{ __('nlIdioma') }}</label>

                            <div class="col-md-6">
                                <input id="nlIdioma" type="text" class="form-control" name="nlIdioma" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resumo" class="col-md-4 col-form-label text-md-right">{{ __('resumo') }}</label>

                            <div class="col-md-6">
                                <input id="resumo" type="text" class="form-control" name="resumo" required>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

