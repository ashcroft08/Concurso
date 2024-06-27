<!DOCTYPE html>
<html lang="en">
<head>
    <title>Code</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"  />
    <noscript><link rel="stylesheet" href="{{ asset('css/noscript.css') }}" /></noscript>
</head>
<body class="homepage is-preload">
    <div id="page-wrapper">
        <!-- Header -->
            <div id="header">

                <!-- Inner -->
                    <div class="inner">
                        <header>
                            <h1><a href="index.html" id="logo"> Universidad Code </a></h1>
                            <hr />
                            <p> Laboratorios a su disposición</p>
                            <p>
                                Registrate y solicita la reserva de un laboratorio en: <a href="http://html5up.net">Solicitar</a>.
                            </p>
                        </header>
                        <footer>
                            <a href="#banner" class="button circled scrolly">Ver</a>
                        </footer>
                    </div>
            </div>
            <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#banner">Laboratorios</a></li>
                        <li><a href="#footer">Sobre Nosotros</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Sign Up</a></li>
                    </ul>
                </nav>
            
        <!-- Banner -->
            <section id="banner">
                <header>
                    <h2>Hola, bienvenidos a la universidad <strong>Code</strong>.</h2>
                    <p>
                        Contamos con espacios en los laboratorios para clases, prácticas y eventos especiales.
                    </p>
                </header>
            </section>

        <!-- Carousel -->
            <section class="carousel">
                <div class="reel">
                    <article>
                        <a href="#" class="image featured"><img src="{{ asset('img/il-cisco.jpg')}}" alt="" /></a>
                        <header>
                            <h3><a href="#"> Laboratorio Cisco </a></h3>
                        </header>
                        <p> Solicita la reserva de un laboratorio.</p>
                        <p> Tenemos laboratorios en las siguientes áreas: </p>
                    </article>

                    <article>
                        <a href="#" class="image featured"><img src="{{ asset('img/il-cisco2.jpg')}}" alt="" /></a>
                        <header>
                            <h3><a href="#"> Laboratorio Cisco 2</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article>
                        <a href="#" class="image featured"><img src="{{ asset('img/il-multimedia.jpg')}}" alt="" /></a>
                        <header>
                            <h3><a href="#"> Laboratorio Multimedia</a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article>
                        <a href="#" class="image featured"><img src="{{ asset('img/il-redes.jpg')}}" alt="" /></a>
                        <header>
                            <h3><a href="#"> Laboratorio de Redes </a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>

                    <article>
                        <a href="#" class="image featured"><img src="{{ asset('img/il-redes2.jpg')}}" alt="" /></a>
                        <header>
                            <h3><a href="#"> Laboratorio de Redes 2 </a></h3>
                        </header>
                        <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
                    </article>
                </div>
            </section>
        <!-- Footer -->
            <div id="footer">
                <!-- *** Contact -->
                <section class="contact">
                    <header>
                        <h3> Sobre Nosotros </h3>
                    </header>
                    <p>En la Universidad Code, estamos dedicados a ofrecer una educación de vanguardia en el campo de la tecnología y las ciencias de la computación. </p>
                    <p>Nuestra misión es formar profesionales altamente capacitados que puedan liderar y transformar la industria tecnológica global.</p>
                    
                    <ul class="icons">
                        <img src="{{ asset('img/facebook.png')}}" width="35" alt="">
                        <img src="{{ asset('img/instagram.png')}}" width="35" alt="">
                        <img src="{{ asset('img/tik-tok.png')}}" width="35" alt="">                    
                    </ul>
                </section>

                <div class="container">
                    <hr />
                    
                    <div class="row">
                        <div class="col-12">                        
                        <!-- ***Copyright -->
                            <div class="copyright">
                                <ul class="menu">
                                    <li>&copy; Code Warriors. Todos los derechos reservados.</li><li>Design: <a> Code Warriors </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js')}}"></script>
        <script src="{{ asset('js/jquery.dropotron.min.js')}}"></script>
        <script src="{{ asset('js/jquery.scrolly.min.js')}}"></script>
        <script src="{{ asset('js/jquery.scrollex.min.js')}}"></script>
        <script src="{{ asset('js/browser.min.js')}}"></script>
        <script src="{{ asset('js/breakpoints.min.js')}}"></script>
        <script src="{{ asset('js/util.js')}}"></script>
        <script src="{{ asset('js/main.js')}}"></script>

</body>
</html>
