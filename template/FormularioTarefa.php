<?php


class FormularioTarefa {
    private $titulo;
    private $action;
    private $method;

    public function __construct($titulo, $action, $method) {
        $this->titulo = $titulo;
        $this->action = $action;
        $this->method = $method;
    }

    public function renderizar() {
        $html = '<h2>' . $this->titulo . '</h2>';
        $html .= '<form action="' . $this->action . '" method="' . $this->method . '">';
        $html .= '<div class="mb-3 col-6">
                  <label for="desc" class="form-label">Descrição</label>
                  <input type="text" class="form-control" id="desc" name="desc" placeholder="Descrição da tarefa" required>
                </div>';
        $html .= '<div class="mb-3 col-3">
                  <div class="input-group mb-3">
                <input type="text" class="form-control" id="status" name="status" aria-label="status" placeholder="Selecione o status" required readonly>
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Status</button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" onclick="document.getElementById(&#039;status&#039;).value=&#039;Pendente&#039;">Pendente</a></li>
                    <li><a class="dropdown-item" href="#" onclick="document.getElementById(&#039;status&#039;).value=&#039;Iniciado&#039;">Iniciado</a></li>
                    <li><a class="dropdown-item" href="#" onclick="document.getElementById(&#039;status&#039;).value=&#039;Concluído&#039;">Concluído</a></li>
                </ul>
                </div>
                </div>';
        $html .= '<button type="submit" class="btn btn-primary">Cadastrar</button>';
        $html .= '</form>';
        return $html;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function getStatus() {
        return $this->status;
    }

}


?>
