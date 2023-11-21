<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;
use \src\models\Medico;
use \src\handlers\handlerLogin;
use src\models\Servico;

class LoginController extends Controller
{

    //Parametro que renderiza o formulário de cadastro
    public function signup()
    {
        $this->render('cadastrar');
    }

    //Método de cadastro de usuário
    public function signupAction()
    {
        //Filtra todos os atributos enviados pelo formulário via POST
        //Transforma a variável em um array com cada parametro enviado
        //a chave de cada parametro é o próprio nome do campo enviado
        $params = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //Faz uma consulta na tabela usuários, procurando o email ou login enviado
        $verifica_dado = Usuario::select()
            ->where('email', $params['email'])
            ->orWhere('login', $params['login'])
            ->execute();

        //Verifica se houve dado retornado na consulta
        if (!$verifica_dado) {
            //Caso não haja retorno da consulta, monta o token de login
            $token = md5(time() . rand(0, 9999) . time());
            //insere o token gerado na sessão
            $_SESSION['token'] = $token;
            //gera um hash da senha enviada do formulário
            $senha = password_hash($params['senha'], PASSWORD_DEFAULT);
            //Insert do novo usuário
            Usuario::insert(
                [
                    'nome' => $params['nome'],
                    'rg' => $params['rg'],
                    'data_nascimento' => $params['data_nascimento'],
                    'telefone' => $params['telefone'],
                    'email' => $params['email'],
                    'endereco' => $params['endereco'],
                    'cep' => $params['cep'],
                    'cidade' => $params['cidade'],
                    'estado' => $params['estado'],
                    'login' => $params['login'],
                    'senha' => $senha,
                    'password' => $senha,
                    'sexo' => $params['sexo'],
                    'token' => $token
                ]
            )->execute();

            // mensagem de "bem vindo" ao novo usuário
            $_SESSION['swal'] = "Seja bem-vindo " . $params['nome'];
            //redirecionando a home do usuário loggado
            $this->redirect('/');
        } else {

            //Caso haja um email já registrado, retorna para a página de cadastro
            $this->redirect('/signup');
        }
    }

    //Método de login
    public function signin()
    {

        //recebe e insere nas respectivas variáveis os dados digitados no formulário de login
        $login =  filter_input(INPUT_POST, 'login');
        $senha =  filter_input(INPUT_POST, 'senha');

        //verifica se foi enviado dados
        if ($login && $senha) {
            //caso tenha sido enviado, é executada a função de verificação de login
            //que caso estejam corretos o email e a senha retorna o token
            $token = handlerLogin::verifyLogin($login, $senha);
            if ($token) {
                //Caso seja retornado o token ele é inserido na variável de sessão
                $_SESSION['token'] = $token;

                //é gerado as mensagens de sucesso
                $_SESSION['swal'] = "Seja bem-vindo!";
                $_SESSION['icon'] = 'success';

                //Redireciona para a home de usuário logado
                $this->redirect('/');
            } else {

                //Gera a mensagem de erro
                $_SESSION['swal'] = "Email, Login ou Senha não conferem";
                $_SESSION['icon'] = 'error';

                //Redireciona para a página inicial sem usuário logado
                $this->redirect('/unsigned');
            }
        }
        //Caso algum dos campos do formulário de login seja enviado sem dados
        //redireciona para a página inicial sem usuário logado
        $this->redirect('/unsigned');
    }

    //Método que realiza o logout do usuário
    public function signout()
    {
        //substitui o token da sessão por uma string vazia
        $_SESSION['token'] = '';

        //gera a mensagem de logout
        $_SESSION['swal'] = 'Logout feito';

        //redireciona para a página inicial sem usuário logado
        $this->redirect('/unsigned');
    }


    //Mètodo que renderiza a página inicial sem usuário logado
    public function unsigned()
    {
        //requisição dos dados dos médicos cadastrados e que não estão deletados
        $lista_medicos = Medico::select()->where('is_deleted', 0)->execute();

        //requisição dos serviços
        $lista_servicos = Servico::select()->execute();

        //array vazio de exames
        $lista_exames = [];

        //array vazio de consultas
        $lista_consultas = [];

        //array vazio de procedimentos
        $lista_procedimentos = [];

        //iteração da lista de todos os serviços
        foreach ($lista_servicos as $servico) {
            //switch no tipo de serviço para preencher o respectivo array
            switch ($servico['tipo_servico']) {
                case 'exames':
                    $lista_exames[] = $servico;
                    break;
                case 'consultas':
                    $lista_consultas[] = $servico;
                    break;
                case 'procedimentos':
                    $lista_procedimentos[] = $servico;
                    break;
            }
        }
        //Array montado com as informações de serviços
        $array = array(

            'lista_medicos' => $lista_medicos,
            'lista_servicos' => $lista_servicos,
            'lista_exames' => $lista_exames,
            'lista_consultas' => $lista_consultas,
            'lista_procedimentos' => $lista_procedimentos
        );
        //renderizando a página inicial sem usuário logado com os dados requisitados
        $this->render('home_unsigned', $array);
    }
}
