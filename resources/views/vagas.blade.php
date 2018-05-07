@extends('layouts.app')

@section('content')

<div class="container-fluid">
            <div class="row">
                <div class="col-md-12 responsive-wrap">
                    @if(!count($vagas) > 0)

                        <h1>Infelizmente não temos nenhuma vaga disponivel no momento!</h1>
                    @else
                        <div class="row detail-filter-wrap">
                            <div class="col-md-4 featured-responsive">
                                <div class="detail-filter-text">
                                    <p>{{count($vagas)}} Resultado(s) para <span>Vagas</span></p>
                                </div>
                            </div>
                            <div class="col-md-8 featured-responsive">
                                <div class="detail-filter">
                                    <p>Filtro</p>
                                    <form class="filter-dropdown">
                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                                          <option selected>As mais procuradas</option>
                                          <option value="1">Um</option>
                                          <option value="2">Dois</option>
                                          <option value="3">Três</option>
                                        </select>
                                    </form>
                                    <form class="filter-dropdown">
                                        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect1">
                                          <option selected>VAGAS DISPONIVEÍS</option>
                                          <option value="1">UM</option>
                                          <option value="2">DOIS</option>
                                          <option value="3">TRÊS</option>
                                        </select>
                                    </form>
                                    <div class="map-responsive-wrap">
                                        <a class="map-icon" href="#"><span class="icon-location-pin"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row detail-checkbox-wrap">
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Analista de Sistemas</span>
                                  </label>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Técnico em Redes </span>
                                  </label>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Desenvolvedor Web </span>
                                  </label>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Arquiteto de Software</span>
                                  </label>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Gestor de Projetos</span>
                                  </label>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Analista de Negócios</span>
                                  </label>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">

                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Desenvolvedor de Banco de dados</span>
                                  </label>

                            </div>
                        </div>
                        <div class="row light-bg detail-options-wrap">
                            @foreach ($vagas as $vaga)
                               <div class="col-md-3 responsive-wrap">
                                    <div class="featured-place-wrap">
                                        
                                            <img src="images/vaga-programador.jpg" class="img-fluid" alt="#">
                                            <span class="featured-rating-green" title="Quantidade de vagas disponiveis">{{$vaga->qt_vagas}}</span>
                                            <div class="featured-title-box">
                                                <h6>{{$vaga->nm_vaga}}</h6>
                                                <p>{{$vaga->areaTI->nm_areaTI}} </p> <span>• </span>
                                                <p>{{$vaga->ds_nivel }}</p> <span> • </span>
                                                <p><span>R$ {{$vaga->vl_salario_vaga }}</span></p>
                                                <ul>
                                                    <li><span class="icon-location-pin"></span>
                                                        <p>{{$vaga->cidade->nm_cidade}}</p>
                                                    </li>
                                                    <li><span class="icon-organization"></span>
                                                        <p>{{$vaga->empresa->ds_razao_social}}</p>
                                                    </li>
                                                    <!--
                                                    <li><span class="icon-link"></span>
                                                        <p>https://EmployTec.com</p>
                                                    </li>
                                                    -->
                                                    <li>
                                                        <span class="icon-calendar"></span>
                                                        <p>Candidatura até {{$vaga->dt_expiracao}}</p>
                                                    </li>
                                                </ul>
                                                @if(auth()->guard('web')->check())
                                                    <a href="#" class="btn btn-primary">Candidatar-se</a>
                                                @endif
                                                <div class="bottom-icons">
                                                    <a href="#" style="text-transform: uppercase;"><div class="open-now">Vizualizar vaga</div></a>
                                                    <span class="ti-heart"></span>
                                                    <span class="ti-bookmark"></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif    
                
            </div>
        </div>
    </div>
    </section>



@endsection