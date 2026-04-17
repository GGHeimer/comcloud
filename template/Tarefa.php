    <?php 
    class Tarefa {
        private $desc;
        private $status;

        public function __construct($desc, $status) {
            $this->desc = $desc;
            $this->status = $status;
        }

        public function adicionarDesc($desc) {
        $this->descricoes[] = $desc;
    }

    public function adicionarStatus($status) {
        $this->statuses[] = $status;
    }
    
    public function getDesc() {
        return $this->desc;
    }

    public function getStatus() {
        return $this->status;
    }

    public function renderizar() {
        return '<tr><td>' . $this->desc . '</td><td>' . $this->status . '</td></tr>';
    }
    }

    ?>