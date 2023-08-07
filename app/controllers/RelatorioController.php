<?php

class Relatorio extends Controller
{

    public function top10(){

        session_start();

        $array_mes = ['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'];
        $mes = isset($_POST['mes']) ? $_POST['mes'] : date('m');
        $ano = isset($_POST['ano']) ? $_POST['ano'] : date('Y');

        $relatorioModel = new RelatorioModel();
        $dados["listagem"] = $relatorioModel->listarTodas($ano, $mes);
        $dados["ano"] = $ano;
        $dados["mes"] = $array_mes[$mes - 1];

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");
        $this->view("relatorio-top10", $dados);
        exit();
    }

    public function maisLidos(){

        session_start();

        $array_mes = ['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'];
        $mes = isset($_POST['mes']) ? $_POST['mes'] : date('m');
        $ano = isset($_POST['ano']) ? $_POST['ano'] : date('Y');

        $relatorioModel = new RelatorioModel();
        $dados["listagem"] = $relatorioModel->listarMaisLidos($ano, $mes);
        $dados["ano"] = $ano;
        $dados["mes"] = $array_mes[$mes - 1];

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");
        $this->view("relatorio-mais-lidos", $dados);
        exit();
    }

    public function avancoNivel(){

        session_start();
        $relatorioModel = new RelatorioModel();

        $dados["listagem"] = $relatorioModel->listarNivel();

        $dados['msg'] = $this->getParams("msg");

        $dados['return'] = $this->getParams("return");
        
        $this->view("relatorio-avanco-nivel", $dados);
        exit();
    }

    public function emprestimo(){

        session_start();

        $relatorioModel = new RelatorioModel();
        $dados["listagem"] = $relatorioModel->listarEmprestimo();

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");
        $this->view("relatorio-emprestimo", $dados);
        exit();
    }

    public function emprestimoVencido(){

        session_start();

        $relatorioModel = new RelatorioModel();
        $dados["listagem"] = $relatorioModel->listarEmprestimoVencido();
        

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");
        $this->view("relatorio-emprestimo-vencido", $dados);
        exit();
    }

    public function tempoLeitura(){

        session_start();

        $relatorioModel = new RelatorioModel();

        $dados["listagem"] = $relatorioModel->listarTempoLeitura();

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");
        $this->view("relatorio-tempo-leitura", $dados);
        exit();
    }

    public function tempoLeituraDia(){

        session_start();

        $relatorioModel = new RelatorioModel();
        $array_mes = ['JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ'];
        $mes = isset($_POST['mes']) ? $_POST['mes'] : date('m');
        $ano = isset($_POST['ano']) ? $_POST['ano'] : date('Y');
        $dia = isset($_POST['dia']) ? $_POST['dia'] : date('d');

        $dados["listagem"] = $relatorioModel->listarTempoLeituraDia($dia, $mes, $ano);
        $dados['dia'] = $dia;
        $dados["ano"] = $ano;
        $dados["mes"] = $array_mes[$mes - 1];

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");
        $this->view("relatorio-tempo-leitura-dia", $dados);
        exit();
    }
}
