<?php $__env->startSection('content'); ?>

<div class="container-fluid">
            <div class="row">
                <div class="col-md-12 responsive-wrap">
                    <div class="row detail-filter-wrap">
                        <div class="col-md-4 featured-responsive">
                            <div class="detail-filter-text">
                                <p>20 Resultado para <span>Vagas</span></p>
                            </div>
                        </div>
                        <div class="col-md-8 featured-responsive">
                            <div class="detail-filter">
                                <p>Filtro</p>
                                <form >
                                    <select>
                 
                     <?php $__currentLoopData = $areasTI; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($a->cd_areaTI); ?>" <?php echo e((isset($vaga) && $a->cd_areaTI == $vaga->fk_area_ti) ? 'selected="selected"' : ''); ?>><?php echo e($a->nm_areaTI); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                       <div class="col-md-4 responsive-wrap">
                            <div class="featured-place-wrap">
                                <a href="detail.html">
                                    <img src="images/vaga-programador.jpg" class="img-fluid" alt="#">
                                    <span class="featured-rating-green">9.5</span>
                                    <div class="featured-title-box">
                                        <h6>Desenvolvedor WEB</h6>
                                        <p>Projeto </p> <span>• </span>
                                        <p>5 Anos</p> <span> • </span>
                                        <p><span>2.000.00</span></p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p>1301 Avenue, Brooklyn, NY 11230</p>
                                            </li>
                                            <li><span class="icon-screen-smartphone"></span>
                                                <p>+44 20 7336 8898</p>
                                            </li>
                                            <li><span class="icon-link"></span>
                                                <p>https://EmployTec.com</p>
                                            </li>

                                        </ul>
                                        <div class="bottom-icons">
                                            <div class="open-now">ABRIR VAGA</div>
                                            <span class="ti-heart"></span>
                                            <span class="ti-bookmark"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                       <div class="col-md-4 responsive-wrap">
                            <div class="featured-place-wrap">
                                <a href="detail.html">
                                    <img src="images/Redes.jpg" class="img-fluid" alt="#">
                                    <span class="featured-rating-green">9.5</span>
                                    <div class="featured-title-box">
                                        <h6>Técnico em Redes </h6>
                                        <p>Projeto </p> <span>• </span>
                                        <p>5 Anos</p> <span> • </span>
                                        <p><span>2.000.00</span></p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p>1301 Avenue, Brooklyn, NY 11230</p>
                                            </li>
                                            <li><span class="icon-screen-smartphone"></span>
                                                <p>+44 20 7336 8898</p>
                                            </li>
                                            <li><span class="icon-link"></span>
                                                <p>https://EmployTec.com</p>
                                            </li>

                                        </ul>
                                        <div class="bottom-icons">
                                            <div class="open-now">ABRIR VAGA</div>
                                            <span class="ti-heart"></span>
                                            <span class="ti-bookmark"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        
                        <div class="col-md-4 responsive-wrap">
                            <div class="featured-place-wrap">
                                <a href="detail.html">
                                    <img src="images/Analista-de-Sistemas.jpg" class="img-fluid" alt="#">
                                    <span class="featured-rating-green">9.5</span>
                                    <div class="featured-title-box">
                                        <h6>Analista de Sistemas</h6>
                                        <p></p>
                                        <p>Projeto </p> <span>• </span>
                                        <p>5 Anos</p> <span> • </span>
                                        <p><span>2.000.00</span></p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p>1301 Avenue, Brooklyn, NY 11230</p>
                                            </li>
                                            <li><span class="icon-screen-smartphone"></span>
                                                <p>+44 20 7336 8898</p>
                                            </li>
                                            <li><span class="icon-link"></span>
                                                <p>https://EmployTec.com</p>
                                            </li>

                                        </ul>
                                        <div class="bottom-icons">
                                            <div class="open-now">ABRIR VAGA</div>
                                            <span class="ti-heart"></span>
                                            <span class="ti-bookmark"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                         <div class="col-md-4 responsive-wrap" >
                            <div class="featured-place-wrap">
                                <a href="detail.html">
                                    <img src="images/scrum-master.jpg" class="img-fluid" alt="#">
                                    <span class="featured-rating-green">9.5</span>
                                    <div class="featured-title-box">
                                        <h6>Scrum Master</h6>
                                        <p>Projeto </p> <span>• </span>
                                        <p>5 Anos</p> <span> • </span>
                                        <p><span>2.000.00</span></p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p>1301 Avenue, Brooklyn, NY 11230</p>
                                            </li>
                                            <li><span class="icon-screen-smartphone"></span>
                                                <p>+44 20 7336 8898</p>
                                            </li>
                                            <li><span class="icon-link"></span>
                                                <p>https://EmployTec.com</p>
                                            </li>

                                        </ul>
                                        <div class="bottom-icons">
                                            <div class="open-now">ABRIR VAGA</div>
                                            <span class="ti-heart"></span>
                                            <span class="ti-bookmark"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4 responsive-wrap" >
                            <div class="featured-place-wrap">
                                <a href="detail.html">
                                    <img src="images/progra_sr.jpg" class="img-fluid" alt="#">
                                    <span class="featured-rating-green">9.5</span>
                                    <div class="featured-title-box">
                                        <h6>Programador Sênior</h6>
                                        <p>Projeto </p> <span>• </span>
                                        <p>5 Anos</p> <span> • </span>
                                        <p><span>2.000.00</span></p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p>1301 Avenue, Brooklyn, NY 11230</p>
                                            </li>
                                            <li><span class="icon-screen-smartphone"></span>
                                                <p>+44 20 7336 8898</p>
                                            </li>
                                            <li><span class="icon-link"></span>
                                                <p>https://EmployTec.com</p>
                                            </li>

                                        </ul>
                                        <div class="bottom-icons">
                                            <div class="open-now">ABRIR VAGA</div>
                                            <span class="ti-heart"></span>
                                            <span class="ti-bookmark"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4 responsive-wrap" >
                            <div class="featured-place-wrap">
                                <a href="detail.html">
                                    <img src="images/Progra_jr.jpg" class="img-fluid" alt="#">
                                    <span class="featured-rating-green">9.5</span>
                                    <div class="featured-title-box">
                                        <h6>Programador Jr</h6>
                                        <p>Projeto </p> <span>• </span>
                                        <p>5 Anos</p> <span> • </span>
                                        <p><span>2.000.00</span></p>
                                        <ul>
                                            <li><span class="icon-location-pin"></span>
                                                <p>1301 Avenue, Brooklyn, NY 11230</p>
                                            </li>
                                            <li><span class="icon-screen-smartphone"></span>
                                                <p>+44 20 7336 8898</p>
                                            </li>
                                            <li><span class="icon-link"></span>
                                                <p>https://EmployTec.com</p>
                                            </li>

                                        </ul>
                                        <div class="bottom-icons">
                                            <div class="open-now">ABRIR VAGA</div>
                                            <span class="ti-heart"></span>
                                            <span class="ti-bookmark"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                <div class="col-md-5 responsive-wrap map-wrap">
                    <div class="map-fix">
                        <!-- data-toggle="affix" -->
                        <!-- Google map will appear here! Edit the Latitude, Longitude and Zoom Level below using data-attr-*  -->
                        <div id="map" data-lat="40.674" data-lon="-73.945" data-zoom="14"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>