<?php /* echo "<pre>";
var_dump($consultas);
exit;*/ ?>
<?php $render('header'); ?>
<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= $base ?>">Home</a></li>
                <li><a href="<?= $base ?>/unidades/consultas">Unidades</a></li>
                <li>Consultas</li>
            </ol>
            <h2>Consultas disponíveis na unidade escolhida</h2>

        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8 entries">
                    <?php foreach ($consultas as $consulta) : ?>
                        <article class="entry">

                            <div class="entry-img">
                                <img src="<?= $base ?>/assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="#"><?= $consulta['tipo_consulta'] ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-coin"></i> <a href="#">R$<?= $consulta['preco_consulta'] ?></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    <?= $consulta['descricao_consulta'] ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?= $base ?>/unidades/<?= $id_unidade ?>/<?= $nome_servico ?>/<?= $consulta['id_consulta'] ?>/agendar">Solicitar</a>
                                </div>
                            </div>

                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php $render('footer'); ?>
<?php $render('scripts'); ?>