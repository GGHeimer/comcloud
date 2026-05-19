<?php
    class TabelaTarefa {
        private $titulo ;
        private $tarefas = [];

        public function __construct($titulo, $tarefas) {
        $this->titulo = $titulo;    
        $this->tarefas = $tarefas;
        }

        public function renderizar() {
            //constrói página com tabela e dados
            $html = '<table class="table">';
            $html .= '<thead><tr><th colspan="3">' . '<div class="titulo"><h3>' . $this->titulo . '</h3></div>' . '</th></tr>';
            $html .= '<tr><th>Descrição</th><th>Status</th><th>Ações</th></tr></thead>';
            $html .= '<tbody>';
            foreach ($this->tarefas as $index => $tarefa) {
                $html .= '<tr><td>' . $tarefa['desc'] . '</td><td>' . $tarefa['status'] . '</td>
                <td><a href="index.php?excluir=' . $index . '" class="excluir"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18 19a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V7H4V4h4.5l1-1h4l1 1H19v3h-1zM6 7v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V7zm12-1V5h-4l-1-1h-3L9 5H5v1zM8 9h1v10H8zm6 0h1v10h-1z"/></svg></a>
                <a href="index.php?editar=' . $index . '" class="editar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256"><path fill="currentColor" d="M224.49 76.2L179.8 31.51a12 12 0 0 0-17 0L39.52 154.83a11.9 11.9 0 0 0-3.52 8.48V208a12 12 0 0 0 12 12h44.69a12 12 0 0 0 8.48-3.51L224.48 93.17a12 12 0 0 0 0-17ZM45.66 160L136 69.65L158.34 92L68 182.34ZM44 208v-38.34l21.17 21.17L86.34 212H48a4 4 0 0 1-4-4m52 2.34L73.66 188L164 97.65L186.34 120ZM218.83 87.51L192 114.34L141.66 64l26.82-26.83a4 4 0 0 1 5.66 0l44.69 44.68a4 4 0 0 1 0 5.66"/></svg></a>
                <a href="index.php?concluir=' . $index . '" class="concluir"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg></a></td>
                </tr>';
            }
            $html .= '</tbody></table>';
            return $html;
        }
    }

?>