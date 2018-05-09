@extends('layouts.app')

@section('content')
   
    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">SOBRE</h2>
            <h3 class="section-subheading text-muted">EmployTec a solução para a vaga do seu emprego.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image" >
                  <img class="rounded-circle img-fluid" src="images/about/1.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>2016-2018</h4>
                    <h4 class="subheading">O começo de tudo</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">A ideia da empresa EmployTec surgiu no ano de 2016, quando um grupo de amigos iniciaram as suas carreiras na Faculdade de Tecnologia de Praia Grande!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image"  >
                  <img class="rounded-circle img-fluid" src="images/about/2.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Março de 2018</h4>
                    <h4 class="subheading">O nascimento de um projeto</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Em março de 2018, os empreendedores da área de tecnologia da informação em conjunto com o professor Rodrigo Lopes Salgado educador da Faculdade de Tecnologia de Praia Grande começaram a desenvolver o seu primeiro site!</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="teste/img/about/3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Abril de 2018</h4>
                    <h4 class="subheading">Fechamento do Escopo</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Apesar do projeto já estar na sua fase de construção, o escopo sobre o tema principal do site ainda não estava totalmente fechado, mas ao observar o mercado de trabalho os fundadores descobriram a grande necessidade de criar-se um site que seja acessível e fácil de achar estágios na área de T.I e com isso foi fechada a ideia principal do site. </p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="images/about/4.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Maio de 2018</h4>
                    <h4 class="subheading">Entrega dos CRUDS</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Em maio de 2018 a EmployTec dá um grande passo para o futuro, fazendo a entrega dos CRUDS!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image" >
                  <h4>Faça parte 
                    <br>da nossa
                    <br>História!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">NOSSA EQUIPE SURPREENDENTE</h2>
            <h3 class="section-subheading text-muted">Equipe pronta para receber você.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="images/team/bryan.jpg" alt="">
              <h4>Bryan Higa</h4>
              <p class="text-muted">Analista de Negócios<BR>Desenvolvedor PHP</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="images/team/luciana.jpg" alt="">
              <h4>Luciana Oliveira</h4>
              <p class="text-muted">Analista de Teste<br>Analista de Negócios</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="images/team/saulo.jpg" alt="">
              <h4>Saulo Pedro</h4>
              <p class="text-muted">Administrador de Banco de Dados<br>Desenvolvedor PHP </p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="images/team/vitoria.jpg" alt="">
              <h4>Vitória Nadejda</h4>
              <p class="text-muted">Desenvolvedora PHP<br>Designer</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @endsection


   
   


