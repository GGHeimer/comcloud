<?php
    class TabelaTarefa {
        private $titulo ;
        private $tarefas = ["teste"];

        public function __construct($titulo, $tarefas) {
        $this->titulo = $titulo;    
        $this->tarefas = $tarefas;
        }

        public function renderizar() {
            $html = '<table class="table">';
            $html .= '<thead><tr><th colspan="3">' . '<div class="titulo"><h3>' . $this->titulo . '</h3></div>' . '</th></tr>';
            $html .= '<tr><th>Descrição</th><th>Status</th><th>Ações</th></tr></thead>';
            $html .= '<tbody>';
            foreach ($this->tarefas as $index => $tarefa) {
                $html .= '<tr><td>' . $tarefa['desc'] . '</td><td>' . $tarefa['status'] . '</td><td><a href="index.php?excluir=' . $index . '" class="excluir"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18 19a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V7H4V4h4.5l1-1h4l1 1H19v3h-1zM6 7v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V7zm12-1V5h-4l-1-1h-3L9 5H5v1zM8 9h1v10H8zm6 0h1v10h-1z"/></svg></a></td></tr>';
            }
            $html .= '</tbody></table>';
            return $html;
        }
    }

?>