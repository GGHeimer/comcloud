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
        $html .= '<a href="index.php?exportar=1" target="_blank" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
	<path d="M0 0h24v24H0z" fill="none" />
	<path fill="currentColor" d="M8 16.5v.5c1.691-2.578 3.6-3.953 6-4v3c0 .551.511 1 1.143 1c.364 0 .675-.158.883-.391C17.959 14.58 22 10.5 22 10.5s-4.041-4.082-5.975-6.137A1.26 1.26 0 0 0 15.143 4C14.511 4 14 4.447 14 5v3c-4.66 0-6 4.871-6 8.5M5 21h14a1 1 0 0 0 1-1v-6.046c-.664.676-1.364 1.393-2 2.047V19H6V7h7V5H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1" />
</svg>
 JSON</a>';
        $html .= '</div>';
        $html .= '<footer><p>&copy; 2026 - Todos os direitos reservados</p></footer>';
        $html .= '</div>';
        $html .= '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>';
        $html .= '</body>';
        $html .= '</html>';
        return $html;
    }
}
?>
