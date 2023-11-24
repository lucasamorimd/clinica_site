<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Clinica - Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= $base ?>/assets/img/favicon.png" rel="icon">
    <link href="<?= $base ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= $base ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= $base ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $base ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= $base ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= $base ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= $base ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= $base ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="<?= $base ?>/assets/css/sweetalert2.css" rel="stylesheet">

    <script src="<?= $base ?>/assets/js/jquery.js"></script>
    <script src="<?= $base ?>/assets/js/sweetalert2.js"></script>
    <!-- =======================================================
  * Template Name: Presento - v3.2.0
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <?php if ($_SESSION['swal']) : ?>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: '<?= $_SESSION['icon'] ?>',
                title: '<?= $_SESSION['swal'] ?>',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    <?php
        $_SESSION['swal'] = null;
        $_SESSION['icon'] = null;
    endif; ?>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="#hero">Clinica<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Galeria</a></li>
                    <li><a class="nav-link scrollto" href="#team">Time de Médicos</a></li>
                    <li class="dropdown"><a><span>Serviços</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#exames">Exames</a></li>
                            <li><a href="#consultas">Consultas</a></li>
                            <li><a href="#procedimentos">Procedimentos</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#contact">Entre em contato</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="" class="get-started-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login</a>
            <!-- Modal -->
        </div>
    </header><!-- End Header -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Fazer Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= $base ?>/signin" method="POST">
                        <div class="row">
                            <div class="form-group">
                                <label for="login">Email ou Login</label>
                                <input type="text" name="login" class="form-control" id="login" placeholder="Digite seu E-mail ou Login" required>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Sua senha" required>
                            </div>
                        </div>
                </div>
                <p class="text-center">Não é cadastrado? <a href="<?= $base ?>/signup">Cadastre-se</a></p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Logar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <section id="hero" class="d-flex align-items-center">

        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-6">
                    <h1>Rede de clínicas</h1>
                    <h2>Cadastre agora mesmo e faça os agendamentos que melhor te atendem</h2>
                    <a href="<?= $base ?>/signup" class="btn-get-started scrollto">Cadastre-se</a>
                </div>
            </div>
        </div>

    </section><!-- End Hero -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch">
                    <div class="content">
                        <h3>Rede de Clínicas</h3>
                        <p>
                            Aqui será colocado um breve resumo sobre a clínica
                        </p>
                        <a href="<?= $base ?>/signup" class="about-btn"><span>Cadastre-se</span> <i class="bx bx-chevron-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-receipt"></i>
                                <h4>Fato Resumido 01</h4>
                                <p>Um fato sobre a clínica</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-cube-alt"></i>
                                <h4>Fato Resumido 02</h4>
                                <p>Outro fato sobre a clínica</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-images"></i>
                                <h4>Mais um fato sobre a clínica</h4>
                                <p>Uma conquista ou importância da clínica</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-shield"></i>
                                <h4>Finalizando fatos</h4>
                                <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>
        </div>
    </section><!-- End About Section -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Galeria</h2>
                <p>Descricao das fotos da clínica</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">Laboratório</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Instalações</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Microscópio</h4>
                            <p>Laboratório</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Microscópio"><i class="bx bx-plus"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Instalações</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Instalações 3"><i class="bx bx-plus"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Patologia</h4>
                            <p>Laboratório</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Patologia"><i class="bx bx-plus"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Instalações 2</h4>
                            <p>Instalações</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Instalações 2"><i class="bx bx-plus"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Laboratório 3</h4>
                            <p>Laboratório</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Laboratório 3"><i class="bx bx-plus"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Instalações 3</h4>
                            <p>Instalações</p>
                            <div class="portfolio-links">
                                <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Instalações 3"><i class="bx bx-plus"></i></a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Médicos</h2>
                <p>Um texto sobre os médicos que atendem na clínica.</p>
            </div>

            <div class="row">
                <?php foreach ($lista_medicos as $medico) : ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="<?= $baseApi?>/medicos/imagens/<?= md5($medico['id_medico'] . '_' . $medico['crm']) ?>/<?= $medico['foto_medico'] ?>" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4><?= $medico['nome_medico'] ?></h4>
                                <span><?= $medico['area_atuacao'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section>
    <section id="exames" class="services section-bg ">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Exames</h2>
                <p>Aqui será colocado todos os exames que a clínica faz</p>
            </div>
            <div class="row">
                <?php foreach ($lista_exames as $exame) : ?>
                    <div class="col-md-6">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <i class="bi bi-briefcase"></i>
                            <h4><a href="#"><?= $exame['nome_servico'] ?></a></h4>
                            <p><?= $exame['descricao_servico'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section id="consultas" class="services section-bg ">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Consultas</h2>
                <p>Aqui será colocado todas as consultas que a clínica faz</p>
            </div>
            <div class="row">
                <?php foreach ($lista_consultas as $consulta) : ?>
                    <div class="col-md-6">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <i class="bi bi-briefcase"></i>
                            <h4><a href="#"><?= $consulta['nome_servico']; ?></a></h4>
                            <p><?= $consulta['descricao_servico'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section id="procedimentos" class="services section-bg ">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Procedimentos</h2>
                <p>Aqui será colocado todos os procedimentos que a clínica realiza</p>
            </div>
            <div class="row">
                <?php foreach ($lista_procedimentos as $procedimento) : ?>
                    <div class="col-md-6">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <i class="bi bi-briefcase"></i>
                            <h4><a href="#"><?= $procedimento['nome_servico'] ?></a></h4>
                            <p><?= $procedimento['descricao_servico'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contato</h2>
                <p>Entre em contato com nossa clínica ou se <a href="<?= $base ?>/signup">cadastre</a></p>
            </div>

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Endereço Principal</h3>
                                <p>Exemplo de endereço</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email</h3>
                                <p>info@example.com<br>contact@example.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Telefones</h3>
                                <p>(55) 5555-5555<br>(88) 88888-8888</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">







                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Presento</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            <div class="social-links text-center text-md-end pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= $base ?>/assets/vendor/aos/aos.js"></script>
    <script src="<?= $base ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $base ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= $base ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= $base ?>/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= $base ?>/assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?= $base ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= $base ?>/assets/js/main.js"></script>


</body>

</html>