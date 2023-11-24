<div class="row">
    <div class="table-responsive">
        <table class="table text-left">
            <tbody>
                <tr>
                    <th scope="row">Resumo</th>
                    <td><?= $modalAgendamento['resumo'] ?></td>
                </tr>
                <tr>
                    <th class="align-middle" scope="row">Arquivo do Resultado</th>
                    <td>
                        <a href="<?=$baseApi?>/download/<?= $usuario->id_usuario ?>/<?= $modalAgendamento['nome_arquivo'] ?>/<?= $usuario->token ?>" target="__blank" class="btn btn-danger">
                            Baixar
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>