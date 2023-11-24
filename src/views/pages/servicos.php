<?php /*echo "<pre>";
var_dump($nome_servico);
die();*/
?>
<?php $render('header'); ?>
<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= $base ?>">Home</a></li>
                <li><a href="<?= $base ?>/unidades/<?= $nome_servico ?>">Unidades</a></li>
                <li><?= ucfirst($nome_servico) ?></li>
            </ol>
            <h2><?= ucfirst($nome_servico) ?> disponíveis na unidade escolhida</h2>

        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8 entries">
                    <?php foreach ($servicos as $servico) : ?>
                        <article class="entry">

                            <div class="entry-img">
                                <img src="<?= $baseApi?>/servicos/imagens/<?= $nome_servico ?>/<?= $servico['nome_servico'] ?>/<?= $servico['foto_principal'] ?>" alt="" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="#"><?= $servico['nome_servico'] ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-coin"></i> <a href="#">R$<?= $servico['preco_servico'] ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><?= $servico['tempo_estimado'] ?> de duração</time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    <?= $servico['descricao_servico'] ?>
                                </p>
                                <div class="read-more">
                                    <a href="<?= $base ?>/unidades/<?= $id_unidade ?>/<?= $nome_servico ?>/<?= $servico['id_servico'] ?>/agendar">Agendar</a>
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