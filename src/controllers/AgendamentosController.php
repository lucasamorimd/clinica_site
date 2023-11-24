<?php

namespace src\controllers;

use \core\Controller;
use \src\handlers\handlerLogin;
use \src\models\Agendamento;
use \src\handlers\handlerAgendamento;
use DateTime;
use src\models\Medico;
use src\models\Prontuario;
use src\models\Servico;
use src\models\Unidade;

class AgendamentosController extends Controller
{
    //Atributo que recebe os valores do usuário logado.
    private $loggedUser;

    //Função construct que checa se há usuário logado e então seta os valores no atributo loggedUser
    public function __construct()
    {
        $this->loggedUser = handlerLogin::checkLogin();
        if ($this->loggedUser === false) {
            //Verifica se há usuário loggado, caso não haja, redireciona para a página inicial deslogada
            $this->redirect('/unsigned');
        }
    }
    //Função que registra um novo agendamento.
    public function agendarServico()
    {
        //Filtra todos os inputs enviados via POST e transforma a variável $params em array
        //E cada chave do array é colocado como o "name" passado pelo formulário
        $params = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //recebe a data em forma de string e separa com a delimitação pela /
        $arrayData = explode('/', $params['data_atendimento']);
        //recebe o ano informado no formulário
        $ano = $arrayData[2];
        //recebe o mês informado no formulário
        $mes = $arrayData[1];
        //recebe o dia informado no formulário
        $dia = $arrayData[0];

        //Transforma as 3 strings em Date no formato americano
        $data_selecionada = new DateTime(date("Y-m-d", mktime(0, 0, 0, $mes, $dia, $ano)));

        //Faz a consulta na tabela agendamentos
        //Pesquisando se há algum registro com tipo, data, hora, médico e situação iguais.
        $verifica_data = Agendamento::select('id_agendamento')
            ->where('tipo_atendimento', $params['tipo_atendimento'])
            ->where('data_atendimento', $data_selecionada->format('Y-m-d'))
            ->where('hora_atendimento', $params['hora_atendimento'])
            ->where('id_medico', $params['id_medico'])
            ->where('situacao', 'pendente')
            ->one();

        //Verifica se houve algum resultado
        if ($verifica_data === false) {

            //Caso o resultado seja falso, gera o insert do novo agendamento.
            //foi colocado dentro de uma variável para em algum caso de necessidade de verificação
            $teste =  Agendamento::insert(
                [
                    'id_usuario' => $this->loggedUser->id_usuario,
                    'id_unidade' => $params['id_unidade'],
                    'id_servico' => $params['id_servico'],
                    'id_medico' => $params['id_medico'],
                    'nome_paciente' => $params['nome_paciente'],
                    'email_paciente' => $params['email_paciente'],
                    'telefone_paciente' => $params['telefone_paciente'],
                    'tipo_atendimento' => $params['tipo_atendimento'],
                    'nome_atendimento' => $params['nome_atendimento'],
                    'data_atendimento' => $data_selecionada->format('Y-m-d'),
                    'hora_atendimento' => $params['hora_atendimento'],
                    'preco_servico' => (float) $params['preco']

                ]
            )->execute();
            //Após a execução do insert, são geradas as mensagens
            $_SESSION['type'] = 'success';
            $_SESSION['swal'] = ucfirst($params['nome_atendimento']) . " agendado com sucesso!";

            //Redirecionamento para a lista de agendados.
            $this->redirect('/' . $params['tipo_atendimento'] . '/agendados');
        }
        //Mensagens de erro
        $_SESSION['type'] = 'error';
        $_SESSION['swal'] = "Houve algum erro no agendamento!";

        //redirecionamento para a página inicial em caso de erro
        $this->redirect('/');
    }

    //Paremetro para gerar formulário de solicitação
    public function solicitar($id)
    {

        //Função para requisitar no banco os dados sobre o serviço que vai ser feito o agendamento
        $dados_solicitar_servico = handlerAgendamento::getDadosSolicitarServico($id);

        //as datas são retornadas como um array onde cada dia tem sua chave.
        //para facilitar no tratamento, gero esse implode para tranformar em uma string separando cada dia por vírgula
        $datas = "'" . implode("','", $dados_solicitar_servico['datas_disponiveis']) . "'";

        //Gerando o array para retornar os dados e renderizar a página de formulário.
        $array = [
            'usuario_dados' => ['usuario' => $this->loggedUser],
            'dados_solicitar_servico' => $dados_solicitar_servico,
            'datas_disp' => $datas,
            'id_servico' => $id['idservico'],
            'nome_servico' => $id['nomeservico']
        ];

        //renderiza a página da pasta "views" com o nome "solicitar.php" enviando o array
        //cada index do array é convertida em uma variável com a respectiva informação
        $this->render('solicitar', $array);
    }


    //Parametro que recebe a requisição ajax para gerar os horários disponíveis
    public function horariosAjax()
    {
        //Variável que recebe o resultado da função getHorários
        //é enviado a data selecionada como "key", o id da unidade, o id do serviço, o nome do serviço e o id do médico selecionado
        $horarios = handlerAgendamento::getHorarios($_POST['key'], $_POST['idUnidade'], $_POST['idServico'], $_POST['nomeServico'], $_POST['idMedico']);

        //os horários são mostrados com "echo" por se tratar de uma requisição ajax
        echo json_encode($horarios);
    }

    //Paremetro que gera 
    public function listarServico($data)
    {

        //modifica a situação passada na url
        //Gambiarrinha gerada por falta de planejamento kkkkk
        if ($data['situacao'] == 'agendados') {
            $data['situacao'] = 'pendente';
        } elseif ($data['situacao'] == 'realizados') {
            $data['situacao'] = 'realizado';
        } else {
            $data['situacao'] = 'aguardando-resultado';
        }
        //gerando o array para requisitar os dados.
        $dados = array(
            'situacao' => $data['situacao'],
            'id_usuario' => $this->loggedUser->id_usuario,
            'tipo_atendimento' => $data['servico']
        );
        //variável que recebe o resultado da função de requisição da lista de agendamentos
        $dados_agendamentos = handlerAgendamento::listarAgendamentos($dados);

        //gerrando o array que vai ser enviado para a página com os dados referentes a situação solicitada.
        $array = array(
            'usuario_dados' => $this->loggedUser,
            'dados_agendamentos' => $dados_agendamentos,
            'tipo_atendimento' => $data['servico'],
            'situacao' => $data['situacao']
        );

        //renderização da página enviando os dados
        $this->render('agendamentos', $array);
    }

    //Parametro para detalhamento de um agendamento específico
    public function detalharServico($id)
    {
        //variável que recebe o resultado da consulta na tabela agendamentos
        $dados_agendamento = Agendamento::select()->where('id_agendamento', $id['id'])->one();


        //verificação de segurança para saber se o usuário que está tentando acessar o registro possuío mesmo id salvo no registro retornado
        if ($this->loggedUser->id_usuario === $dados_agendamento['id_usuario']) {
            //Não tendo nenhuma incoerência entre o id loggado e o id salvo no registro
            //É feito as consultas ao banco para pegar as informações sobre médico, serviço, unidade.
            //Em caso de agendamento já realizado, traz o resultado do prontuário.
            $dados_medico = Medico::select()->where('id_medico', $dados_agendamento['id_medico'])->one();
            $dados_servico = Servico::select()->where('id_servico', $dados_agendamento['id_servico'])->one();
            $dados_unidade = Unidade::select()->where('id_unidade', $dados_agendamento['id_unidade'])->one();
            $dados_prontuario = Prontuario::select()->where('id_prontuario', $dados_agendamento['id_prontuario'])->one();
            //Renderiza a página de detalhar agendamento enviando as informações no array
            $this->render('detalheAgendamento', [
                'dados_medico' => $dados_medico,
                'dados_servico' => $dados_servico,
                'dados_unidade' => $dados_unidade,
                'dados_agendamento' => $dados_agendamento,
                'dados_prontuario' => $dados_prontuario,
                'usuario_dados' => $this->loggedUser
            ]);
        } else {
            //Caso haja incoerência entre o id do usuário logado e o id no registro a ser detalhado
            //gera uma mensagem de erro na sessão
            $_SESSION['swal'] = "Sem autorização";
            $_SESSION['type'] = 'warning';

            //redireciona para o início
            $this->redirect('/');
        }
    }

    //Função simples de cancelamento de usuário

    public function cancelarAgendamento()
    {

        //verifica se o usuário que solicitou o cancelamento é o o mesmo do registro a ser cancelado
        if ($_POST['idUsuario'] === $this->loggedUser->id_usuario) {
            // exclui o agendamento
            $cancelamento = Agendamento::delete()->where('id_agendamento', $_POST['idAgendamento'])->execute();
            //Essa função é utilizada em uma requisição ajax
            //É exibido esse 1 para sinalizar que deu certo
            echo 1;
        }
    }
}
