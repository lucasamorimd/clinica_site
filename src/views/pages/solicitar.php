<?php /*echo "<pre>";
var_dump($datas_disp);
exit;*/ ?>
<?php $render('header'); ?>
<main id="main">
    <section class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="<?= $base ?>">Home</a></li>
                <li><a href="<?= $base ?>/unidades/<?= $nome_servico ?>">Unidades</a></li>
                <li><a href="<?= $base ?>/unidades/<?= $dados_solicitar_servico['unidade']['id_unidade'] ?>/<?= $nome_servico ?>"><?= ucfirst($nome_servico) ?></a></li>
                <li>Agendar</li>
            </ol>
            <h2>Agendar <?= ucfirst($nome_servico) ?> </h2>

        </div>
    </section>
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container">
                        <div class="swiper-wrapper align-items-center">
                            <?php foreach ($dados_solicitar_servico['fotos_slideshow'] as $foto) : ?>
                                <div class="swiper-slide">
                                    <img src="<?= $baseApi?>/servicos/imagens/<?= $nome_servico ?>/<?= $dados_solicitar_servico['servico']['nome_servico'] ?>/<?= $foto['nome_foto'] ?>" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3><?= $dados_solicitar_servico['servico']['nome_servico'] ?></h3>
                        <form id="formSolicitarExame" method="POST" action="<?= $base ?>/agendar-servico">
                            <ul>
                                <h4>Dados do paciente</h4>
                                <li><strong>Nome do Paciente</strong>:
                                    <div class="form-row">
                                        <div class="col">
                                            <input name="nome_paciente" type="text" class="form-control" value="<?= $usuario_dados['usuario']->nome ?>" required>
                                        </div>
                                    </div>
                                </li>
                                <li><strong>Email do Paciente</strong>:
                                    <div class="form-row">
                                        <div class="col">
                                            <input name="email_paciente" type="text" class="form-control" value="<?= $usuario_dados['usuario']->email ?>" required>
                                        </div>
                                    </div>
                                </li>
                                <li><strong>Telefone do Paciente</strong>:
                                    <div class="form-row">
                                        <div class="col">
                                            <input name="telefone_paciente" type="text" class="form-control" value="<?= $usuario_dados['usuario']->telefone ?>" required>
                                        </div>
                                    </div>
                                </li>
                                </li>
                                <li><strong>Preço</strong>: R$
                                    <div class="form-row">
                                        <div class="col">
                                            <input name="preco" type="text" class="form-control" value="<?= number_format($dados_solicitar_servico['servico']['preco_servico'], 2, ',', '.') ?>" readonly>
                                        </div>
                                    </div>

                                </li>
                                <li><strong>Médicos disponíveis</strong>:
                                    <div class="form-row">
                                        <div class="col">
                                            <select class="form-select" id="id_medico" name="id_medico" required>
                                                <option value="">Selecione o médico desejado</option>
                                                <?php foreach ($dados_solicitar_servico['medicos'] as $medico) : ?>
                                                    <option value="<?= $medico['id_medico'] ?>"><?= $medico['nome_medico'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </li>
                                <li><strong>Data desejada</strong>:
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" name="data_atendimento" value="" id="selectData" onclick="event.preventDefault();selecionarData({dados:[<?= $datas_disp ?>]})" readonly />
                                        </div>
                                    </div>
                                </li>
                                <li><strong>Horário Desejado</strong>:
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" name="hora_atendimento" value="" id="selectHora" onclick="event.preventDefault();
                                            selecionarHora({
                                                base:'<?= $base ?>',
                                            idUnidade:'<?= $dados_solicitar_servico['unidade']['id_unidade'] ?>', 
                                            idServico:'<?= $id_servico ?>', 
                                            nomeServico:'<?= $nome_servico ?>'})" readonly />
                                        </div>
                                    </div>

                                    <!-- INPUTS HIDDENS -->
                                    <input type="hidden" name="id_unidade" value="<?= $dados_solicitar_servico['unidade']['id_unidade'] ?>" />
                                    <input type="hidden" name="id_servico" value="<?= $id_servico ?>" />
                                    <input type="hidden" name="nome_atendimento" value="<?= $dados_solicitar_servico['servico']['nome_servico'] ?>" />
                                    <input type="hidden" name="tipo_atendimento" value="<?= $nome_servico ?>" />
                                </li>
                                <li>
                                <button onclick="event.preventDefault(); submitar()" type="submit" class="btn btn-outline-danger">Finalizar</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->

</main>
<script src="<?= $base ?>/assets/js/functions.js"></script>
<?php $render('footer'); ?>
<?php $render('scripts'); ?>