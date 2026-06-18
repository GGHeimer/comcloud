<?php


class Pagina {
    private $titulo;
    private $elementos = [];
    private $tabela = null;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function adicionarElemento($elemento) {
        $this->elementos[] = $elemento;
    }

    public function adicionarTabela($tabela) {
        $this->tabela = $tabela;
    }

    public function renderizar() {
        $html = '<!DOCTYPE html>';
        $html .= '<html lang="pt-br">';
        $html .= '<head>';
        $html .= '<meta charset="UTF-8">';
        $html .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        $html .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">';
        $html .= '<link rel="stylesheet" href="../utils/css/style.css">';
        $html .= '<title>' . $this->titulo . '</title>';
        $html .= '</head>'; 
        $html .= '<body>';
        $html .= '<div class="container">';
        $html .= '<div class="form-group">';
        $html .= '<h1>' . $this->titulo . '</h1>';
        foreach ($this->elementos as $elemento) {
            $html .= $elemento->renderizar();
        }
        if ($this->tabela !== null) {
            $html .= $this->tabela->renderizar();
        }
        $html .= '<button onclick="exportarJSON()" class="btn btn-warning">Mostrar lista de tarefas da API</button>';
        $html .= '<div class="modal fade" id="modalJSON" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Dados JSON</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><pre id="jsonOutput" class="bg-light p-3 rounded"></pre></div></div></div></div>';
        $html .= '</div>';
        $html .= '<footer><p>&copy; 2026 - Todos os direitos reservados</p></footer>';
        $html .= '</div>';
        $html .= '<script src="../utils/js/script.js"></script>';
        $html .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>';
        $html .= '</body>';
        $html .= '</html>';
        return $html;
    }
}
?>
