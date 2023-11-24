<?php $render('header') ?>
<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= $base ?>">Home</a></li>
                <li><a href="<?= $base ?>/<?= $dados_agendamento['tipo_atendimento'] ?>/<?= ($dados_agendamento['situacao'] === 'pendente') ? 'agendados' : $dados_agendamento['situacao'] . 's' ?>">Agendamentos</a></li>
                <li>Detalhar</li>
            </ol>
            <h2>Detalhes do agendamento</h2>

        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info"><?= $dados_agendamento['nome_atendimento'] ?>
                        <?php if ($dados_agendamento['situacao'] === 'pendente') : ?>
                            <button type="button" class="btn btn-danger" onclick="event.preventDefault(); 
                            swalCancelar({

                                base:'<?= $base ?>', 
                                idAgendamento:'<?= $dados_agendamento['id_agendamento'] ?>',
                                tipoAgendamento:'<?= $dados_agendamento['tipo_atendimento'] ?>', 
                                idUsuario:'<?= $usuario_dados->id_usuario ?>',
                                nomeAtendimento:'<?= $dados_agendamento['nome_atendimento'] ?>'
                                
                                        })">
                                Cancelar
                            </button>
                        <?php endif; ?>
                    </h4>
                    <div class="card-body">
                        <h4 class="card-title"><?= ucfirst($dados_agendamento['tipo_atendimento']) ?></h4>
                        <p class="card-text"><?= $dados_servico['descricao_servico'] ?></p>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table text-left">
                                        <thead class="table-dark">
                                            <tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Unidade</th>
                                                <td><?= $dados_unidade['nome_unidade'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Endereco</th>
                                                <td><?= $dados_unidade['endereco_unidade'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cidade</th>
                                                <td><?= $dados_unidade['cidade_unidade'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Data Marcada</th>
                                                <td><?= date('d/m/Y', strtotime($dados_agendamento['data_atendimento'])) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Horário Marcado</th>
                                                <td><?= date('H:i', strtotime($dados_agendamento['hora_atendimento'])) ?> horas</td>
                                            </tr>
                                            <tr>
                                                <th class="align-middle" scope="row">Médico</th>
                                                <td>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#detalha_medico">
                                                        Detalhar
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php if ($dados_agendamento['id_prontuario']) : ?>
                                                <tr>
                                                    <th class="align-middle" scope="row">Resultado</th>
                                                    <td>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#detalha_prontuario">
                                                            Detalhar
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 mx-auto" style="width: 200px;">
                                <div class="card" style="width: 18rem;">
                                    <img src="<?= $baseApi?>/medicos/imagens/<?= md5($dados_medico['id_medico'] . '_' . $dados_medico['crm']) ?>/<?= $dados_medico['foto_medico'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center"><?= $dados_medico['nome_medico'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="modal fade" id="detalha_medico" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Dados do Médico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $render('modal_medico', ['modalAgendamento' => $dados_medico]); ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Retornar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detalha_prontuario" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Resumo do prontuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $render('modal_prontuario', ['modalAgendamento' => $dados_prontuario, 'usuario' => $usuario_dados]); ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Retornar</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= $base ?>/assets/js/confirm_functions.js"></script>
<?php $render('footer'); ?>
<?php $render('scripts'); ?>