<?php

session_start();

spl_autoload_register(function ($class_name){
    include $class_name . '.php';
});

//constrói a página
$pagina = new Pagina('Lista de Tarefas - Cloud');

//preenche formulário para edição
$editDesc = '';
$editStatus = '';
if (isset($_GET['editar'])) {
    $index = (int) $_GET['editar'];
    if (isset($_SESSION['tarefas'][$index])) {
        $editDesc = $_SESSION['tarefas'][$index]['desc'];
        $editStatus = $_SESSION['tarefas'][$index]['status'];
    }
}

//constrói o formulário
$formCadastro = new FormularioTarefa("Inserir Tarefa", "index.php", "post", $editDesc, $editStatus);

//exclui tarefa da sessão e redireciona
if (isset($_GET['excluir'])) {
    $index = (int) $_GET['excluir'];
    array_splice($_SESSION['tarefas'], $index, 1);
    header('Location: index.php');
    exit;
}

//adiciona ou edita tarefa na sessão e redireciona
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $editIndex = $_POST['editIndex'];
    if ($editIndex !== '') {
        $_SESSION['tarefas'][(int)$editIndex] = [
            'desc' => $_POST['desc'],
            'status' => $_POST['status']
        ];
    } else {
        $_SESSION['tarefas'][] = [
            'desc' => $_POST['desc'],
            'status' => $_POST['status']
        ];
    }
    header('Location: index.php');
    exit;
}

//concluir tarefa
if (isset($_GET['concluir'])) {
    $index = (int) $_GET['concluir'];
    if (isset($_SESSION['tarefas'][$index])) {
        $_SESSION['tarefas'][$index]['status'] = 'Concluído';
    }
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