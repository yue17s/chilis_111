<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width,initial-scale=1">
    <meta name="description" content="Imprenta Pre Prensa Peruana Arequipa PERU">
    <meta name="keywords" content="Imprenta,impresores,K R,K&R,KyR,preprensa,arequipa,AQP">
    <title><?php the_title();?></title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css ">
    <link rel="stylesheet" href="<?php bloginfo("template_directory");?>/style.css">
</head>
<body>
    <header>
            <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div class="rsociales container">
                           <div class="sharethis-inline-share-buttons"></div>
                       </div>
                   </div>
               </div>
            </div>

        <div class="menu">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse centrarmenu">
                                <?php wp_nav_menu(['menu_class'=>'nav navbar-nav','container'=>'','depth'=>1]);?>
                            </div>
                        </div>
                    </nav>
                  </div>
               </div>
            </div>
        </div> 
    </header>
    <main class="banner__background">
            <div class="container main1">
                <div class="row">
                    <div class="col-md-10" slider__derecha>
                        <!---------------------- SLIDER DE IMAGENES --------------------------->
                       <div class="banner_publicitario">
                            <div class="row">
                                 <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                      <li data-target="#myCarousel" data-slide-to="1"></li>
                                      <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                      <div class="item active">
                                        <img src="<?php bloginfo("template_directory");?>/img/fo01.jpg" alt="Los Angeles" style="width:100%;">
                                        <div class="carousel-caption">
                                            <h2>IMPRESIONES <strong>OFFSET</strong></h2>
                                            <h3>En toda clase de papel </h3>
                                        </div>
                                      </div>

                                      <div class="item">
                                        <img src="<?php bloginfo("template_directory");?>/img/fo02.jpg" alt="Chicago" style="width:100%;">
                                        <div class="carousel-caption">
                                            <h2><strong>VARIEDAD</strong> DE FORMATOS</h2>
                                            <h3>Afiches, Bifoliados, Comprobantes, etc</h3>
                                        </div>
                                      </div>
                                      <div class="item">
                                        <img src="<?php bloginfo("template_directory");?>/img/fo03.jpg" alt="New york" style="width:100%;">
                                        <div class="carousel-caption">
                                            <h2>TAMAÑOS y <strong>CALIDADES</strong></h2>
                                            <h3>A3, A4, A5 - 40gr., 60gr., 80gr., 100gr. - brillo, mate... </h3>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                      <span class="glyphicon glyphicon-chevron-left"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </div>
                            </div>
                       </div>
                    </div>
                    <div class="col-md-2 slider__izquierda">
                       <div class="row">
                           <div class="col-md-6">
                                <div class="arriba">
                                    <img src="<?php bloginfo("template_directory");?>/img/fo_01.jpg" alt="">
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="abajo">
                                    <img src="<?php bloginfo("template_directory");?>/img/fo_02.jpg" alt="">
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            <!--------------------------------------------------------------------------------------------->
            <div class="container arti">
                <div class="row">
                       <div class="col-md-3">
                            <h3>CALIDAD</h3>
                                <p><strong>Calidad Garantizada</strong><br>Un excelente equipo de profesionales y tecnología de última generación garantizan la máxima calidad de nuestro servicio.
                                </p>
                        </div>
                       <div class="col-md-3">
                            <h3>RAPIDEZ</h3>
                                <p><strong>Rapidez y Eficacia</strong><br>¿Para cuando lo necesitas? Entendemos tus urgencias y nos adaptamos a tus necesidades. Consúltanos.
                                </p>
                        </div>
                       <div class="col-md-3">
                            <h3>ECONÓMICO</h3>
                                <p><strong>Precios Económicos</strong><br>Echa un vistazo a nuestros precios, y comprobarás lo competitivos que son en cualquiera de los productos.
                                </p>
                        </div>
                       <div class="col-md-3">
                            <h3>EXPERIENCIA</h3>
                                <p><strong>Seriedad y Experiencia</strong><br>Más de 20 años de experiencia en el sector de las artes gráficas. Todos los trabajos se realizan íntegramente en nuestros talleres.
                                </p>
                        </div>                        
                    </div>
           </div>
           <div class="container arti2">
               <div class="row arti2__titulo">
                   <div class="col-md-12">
                       <h2>Nuestros Servicios</h2>
                   </div>
               </div>
               <div class="row titu2">
                   <div class="col-md-4">
                       <h2><img src="<?php bloginfo("template_directory");?>/img/fon_01.jpg" alt=""></h2>
                       <p>Formatos de Impresión</p>
                   </div>
                   <div class="col-md-4">
                       <h2><img src="<?php bloginfo("template_directory");?>/img/fon_02.jpg" alt=""></h2>
                       <p>Comprobantes de Pago</p>
                   </div>
                   <div class="col-md-4">
                       <h2><img src="<?php bloginfo("template_directory");?>/img/fon_03.jpg" alt=""></h2>
                       <p>Numerado de Hojas</p>
                   </div>
               </div>
           </div>
           <div class="arti3">
               <div class="container">
                   <div class="row arti3__titulo">
                      <div class="col-md-12">
                           <h2>TRABAJO FINAL</h2>
                      </div>
                   </div>
                   <div class="row">
                           <div class="arti3__borde col-md-3">
                                <h3>Libros</h3>
                                    <p><strong>Imprimir libros</strong> es nuestra gran pasión, llevamos muchos años imprimiendo libros para instituciones públicas y privadas, editoriales y también para particulares. Nuestro objetivo empresarial es que cualquier persona que desee tener un libro bien impreso y a un precio asequible, pueda contar con nosotros. Las modernas tecnologías de impresión digital nos permiten hoy en día hacer tiradas cortas de libros con el mismo cariño y esmero que ponemos en las ediciones largas, pero reduciendo costes, preocupaciones de almacenaje, tiempos de entrega, etc. Se trata de un sistema que permite realizar también ediciones piloto para ver la aceptación de un título en el mercado o atender a sectores con poco volumen de ventas.
                                    </p>
                           </div>
                           <div class="arti3__borde col-md-3">
                                <h3>Revistas</h3>
                                    <p>La impresión de <strong>catálogos y revistas</strong> es otra de nuestras grandes especialidades. Muchas empresas que recurren a la impresión de sus catálogos para asistir a ferias y eventos a promocionar sus productos. En KyR Impresiones estamos acostumbrados a trabajar con ellas, cumpliendo con sus exigencias de calidad y plazos de entrega.</p>
                                    <p>Excelencia, capacidad de escucha y profesionalidad son los valores que han hecho de La Imprenta CG una de las empresas valencianas más reconocidas en el sector gráfico.</p>
                            </div>
                           <div class="arti3__borde col-md-3">
                                <h3>Folletos, Flyers</h3>
                                    <p>La impresión de <strong>flyers, folletos, carteles y desplegables</strong> es una opción muy económica para dar a conocer los servicios o productos de una empresa. En La Imprenta CG tenemos una amplia experiencia en la impresión de estos productos y estamos a tu disposición para asesorarte en la elección del papel, en las forma de plegado y en todos los detalles necesarios para que tu producto alcance su objetivo comunicativos.
                                    </p>
                                    <p>Los procesos de impresión, manipulación, corte, doblado, grapado, encolado, etc, se efectúan íntegramente en nuestra imprenta, lo que redunda en unos precios más competitivos y en una mayor rapidez en los tiempos de fabricación y entrega.</p>
                            </div>
                           <div class="col-md-3">
                                <h3>Tarjetas, Calendarios</h3>
                                    <p>También podemos imprimir <strong>tarjetas de visita, postales, calendarios, agendas, libretas, carpetas, material de oficina</strong> y lo que necesites para tu empresa o a nivel particular. Para imprimir los productos que ofrecemos en nuestra tienda online, utilizamos materiales de máxima calidad. Cuidamos mucho los acabados para que tus productos transmitan la imagen y el prestigio que mereces.</p>
                                    <p>Unas bonitas tarjetas de visita, unas agendas personalizadas o unas carpetas de empresa necesitan de una buena impresión para captar la atención y confianza de tus clientes. En La Imprenta CG aconsejamos en la elección de los papeles y en los acabados para sacarle el máximo rendimiento a tus productos comunicativos.</p>
                           </div>
                        <div class="row">
                            <div class="boton col-md-12">
                                <ul class="boton__dentro">
                                    <li>
                                        <button class="btn" onClick="location.href='index_informate.html'">INFORMATE</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                   </div>
               </div>
           </div>
           <div class="container arti4">
              <div class="row">
               <div class="col-md-12">
                   <div class="cycle-slideshow" data-cycle-fx="carousel" data-cycle-timeout="1000" data-cycle-carousel-visible="4" data-cycle-carousel-fluid="true">
                      <div class="cycle-pager span"></div>
                        <img src="<?php bloginfo("template_directory");?>/img/logo_01.png">
                        <img src="<?php bloginfo("template_directory");?>/img/logo_02.png">
                        <img src="<?php bloginfo("template_directory");?>/img/logo_03.png">
                        <img src="<?php bloginfo("template_directory");?>/img/logo_04.png">
                        <img src="<?php bloginfo("template_directory");?>/img/logo_05.png">
                        <img src="<?php bloginfo("template_directory");?>/img/logo_06.png">
                        <img src="<?php bloginfo("template_directory");?>/img/logo_07.png">
                        <img src="<?php bloginfo("template_directory");?>/img/logo_08.png">
                        <img src="<?php bloginfo("template_directory");?>/img/logo_09.png">
                   </div>
                </div>
                </div>
           </div>
           <div class="container arti5">
               <div class="row">
                   <div class="arti5__izquierda borde col-md-6">
                      <h2>INSCRIBETE PARA VER NUESTRAS ÚLTIMAS OFERTAS o DISEÑOS</h2>
                      <h3>¡Recibe el 10% de descuento en tu primer servicio y otras grandes ofertas!</h3>
                       <ul class="correo">
                            <li>
                                <input name="email" type="text" class="txt" placeholder="introduce aquí tu correo">
                                <button class="btn">Registrate</button>
                            </li>
                            <li>
                                <label for=""><strong>Por favor introduzca una dirección de correo electrónico válida</strong></label>
                            </li>
                       </ul>
                   </div>
                   <div class="arti5__derecha col-md-6">
                       <div class="row">
                            <div class="col-md-12">
                               <h2>ATENCIÓN AL CLIENTE</h2>
                               <h3>Contactanos mediante las siguientes formas:</h3>
                            </div>
                       </div>
                       <div class="row atencion">
                           <div class="col-md-4">
                               <img src="<?php bloginfo("template_directory");?>/img/index/ico_chat.png">
                               <p>Chat</p>
                           </div>
                           <div class="col-md-4">
                               <img src="<?php bloginfo("template_directory");?>/img/index/ico_fono.png">
                               <p>054-336655</p>
                           </div>
                           <div class="col-md-4">
                               <img src="<?php bloginfo("template_directory");?>/img/index/ico_mail.png">
                               <p>soporte@kyrimpresiones.com</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
    </main>
    <footer>
       <div class="footer__detalles">
           <div class="row ">
                <div class="col-md-3">
                    <p><img src="<?php bloginfo("template_directory");?>/img/foo_dire.png" alt="">Arequipa, Pizarro 312 int. 56 - Cercado</p>
                </div>
                <div class="col-md-3">
                    <p><img src="<?php bloginfo("template_directory");?>/img/foo_hora.png" alt="">9-1pm. / 2-9pm.</p>
                </div>
                <div class="col-md-3">
                    <p><img src="<?php bloginfo("template_directory");?>/img/foo_fono.png" alt="">RPM 959916324</p>
                </div>
                <div class="col-md-3">
                    <p><img src="<?php bloginfo("template_directory");?>/img/foo_email.png" alt="">kr_impresores@hotmail.com</p>
                </div>
           </div>
       </div>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=596d6a09aec25f00114bf264&product=inline-share-buttons"></script>    
    <script src="<?php bloginfo("template_directory");?>/js/jquery.cycle2.min.js"></script>
    <script src="<?php bloginfo("template_directory");?>/js/jquery.cycle2.carousel.min.js"></script>
</body>
</html>