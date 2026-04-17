<?php

session_start();

spl_autoload_register(function ($class_name){
    include $class_name . '.php';
});

//constrói a página
$pagina = new Pagina('Lista de Tarefas - Cloud');

//constrói o formulário
$formCadastro = new FormularioTarefa("Inserir Tarefa", "index.php", "post");

//exclui tarefa da sessão e redireciona
if (isset($_GET['excluir'])) {
    $index = (int) $_GET['excluir'];
    array_splice($_SESSION['tarefas'], $index, 1);
    header('Location: index.php');
    exit;
}

//adiciona tarefa recem criada na sessão e redireciona
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['tarefas'][] = [
        'desc' => $_POST['desc'],
        'status' => $_POST['status']
    ];
    header('Location: index.php');
    exit;
}

//adiciona todas as tarefas da sessão na página
$tabela = new TabelaTarefa("Lista de Tarefas", $_SESSION['tarefas'] ?? []);
$pagina->adicionarTabela($tabela);

//adiciona o formulário na página
$pagina->adicionarElemento($formCadastro);


//renderiza a página
echo $pagina->renderizar();