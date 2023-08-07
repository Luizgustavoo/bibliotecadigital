<?php

class RelatorioModel extends Model
{


    public function listarTodas($ano, $mes)
    {
        $places = ['leitor.idLeitor', 'leitor.nomeLeitor', '(select  sum(time_to_sec(timediff(leituralivro.dataLeituraFim, leituralivro.dataLeitura))) 
        from leituralivro where leituralivro.idLeitor = leitor.idLeitor and
        year(leituralivro.dataLeituraFim) = ' . $ano . ' and year(leituralivro.dataLeitura) = ' . $ano . '
        and month(leituralivro.dataLeituraFim) = ' . $mes . ' and month(leituralivro.dataLeitura) = ' . $mes . '
        ) as tempoLeituraSegundos', '(((select  sum(time_to_sec(timediff(leituralivro.dataLeituraFim, leituralivro.dataLeitura))) 
        from leituralivro where leituralivro.idLeitor = leitor.idLeitor and
        year(leituralivro.dataLeituraFim) = ' . $ano . ' and year(leituralivro.dataLeitura) = ' . $ano . '
        and month(leituralivro.dataLeituraFim) = ' . $mes . ' and month(leituralivro.dataLeitura) = ' . $mes . '
        )/60)/60) as tempoLeituraHora'];
        $innerjoin = null;
        $where = null;
        $orderby = 'tempoLeituraSegundos desc';
        $limit = 30;
        $offset = null;
        $groupby = null;


        return $this->read('leitor', $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
    }
<<<<<<< HEAD
    public function listarTempoLeituraDia($dia, $mes, $ano)
    {
        $places = ['leitor.idLeitor', 'leitor.nomeLeitor', '(select  sum(time_to_sec(timediff(leituralivro.dataLeituraFim, leituralivro.dataLeitura))) 
        from leituralivro where leituralivro.idLeitor = leitor.idLeitor and
        year(leituralivro.dataLeituraFim) = ' . $ano . ' and year(leituralivro.dataLeitura) = ' . $ano . '
        and month(leituralivro.dataLeituraFim) = ' . $mes . ' and month(leituralivro.dataLeitura) = ' . $mes . '
        and day(leituralivro.dataLeituraFim) = ' . $dia . ' and day(leituralivro.dataLeitura) = ' . $dia . '
        ) as tempoLeituraSegundos, (((select  sum(time_to_sec(timediff(leituralivro.dataLeituraFim, leituralivro.dataLeitura))) 
        from leituralivro where leituralivro.idLeitor = leitor.idLeitor and
        year(leituralivro.dataLeituraFim) = ' . $ano . ' and year(leituralivro.dataLeitura) = ' . $ano . '
        and month(leituralivro.dataLeituraFim) = ' . $mes . ' and month(leituralivro.dataLeitura) = ' . $mes . '
        )/60)/60) as tempoLeituraHora'];
        $innerjoin = null;
        $where = null;
        $orderby = 'tempoLeituraSegundos desc';
        $limit = 30;
        $offset = null;
        $groupby = null;


        return $this->read('leitor', $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
    }

    public function listarTempoLeitura()
    {
        $places = ['leitor.idLeitor', 'leitor.nomeLeitor', '(select sum(time_to_sec(timediff(leituralivro.dataLeituraFim, leituralivro.dataLeitura))) 
=======

    public function listarTempoLeitura()
    {
        $places = ['leitor.idLeitor', 'leitor.nomeLeitor', '(select  sum(time_to_sec(timediff(leituralivro.dataLeituraFim, leituralivro.dataLeitura))) 
>>>>>>> e40b4c097f0819c99998c868a48143854e846cea
        from leituralivro where leituralivro.idLeitor = leitor.idLeitor) as tempoLeituraSegundos'];
        $innerjoin = null;
        $where = null;
        $orderby = 'tempoLeituraSegundos desc';
        $limit = null;
        $offset = null;
        $groupby = null;
        return $this->read('leitor', $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
    }

<<<<<<< HEAD

=======
>>>>>>> e40b4c097f0819c99998c868a48143854e846cea
    public function listarEmprestimo()
    {
        // $places = ['leitor.idLeitor', 'leitor.nomeLeitor', "(select 
        // group_concat(concat(liv.idLivro,';', liv.tituloLivro,';',
        // emp.dataEmprestimo,';',
        // emp.dataDevolucao,';',
        // emp.statusEmprestimo) separator '|')
        // from leitor le 
        // inner join emprestimo emp on le.idLeitor = emp.idLeitor
        // inner join livrosemprestimo liv_emp on emp.idEmprestimo = liv_emp.idEmprestimo
        // inner join livro liv on liv_emp.idLivro = liv.idLivro
        // where le.idLeitor = leitor.idLeitor) as livros"];
        // $innerjoin = null;
        // $where = "leitor.idLeitor in (select emprestimo.idLeitor from emprestimo)";
        // $orderby = null;
        // $limit = null;
        // $offset = null;
        // $groupby = null;
        // return $this->read('leitor', $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
        return $this->readCALL('emprestimo()');
    }

<<<<<<< HEAD

    public function listarEmprestimoVencido()
    {
        $places = ['leitor.nomeLeitor', 'emprestimo.dataEmprestimo', 'emprestimo.dataDevolucao', '(select 
        group_concat(livro.tituloLivro separator ";")
        from livrosemprestimo inner join livro on livrosemprestimo.idLivro = livro.idLivro where livrosemprestimo.idEmprestimo = emprestimo.idEmprestimo) as livros'];
        $innerjoin = 'inner join leitor on leitor.idLeitor = emprestimo.idLeitor';
        $where = "emprestimo.statusEmprestimo = 'aberto' and dataDevolucao <= now()";
        $orderby = null;
        $limit = null;
        $offset = null;
        $groupby = null;
        return $this->read('emprestimo', $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
        // return $this->readCALL('emprestimo()');
    }

=======
>>>>>>> e40b4c097f0819c99998c868a48143854e846cea
    public function listarNivel()
    {
        $segundosRaro = (LEITOR_RARO + 1) * 3600;
        $segundosLendario = (LEITOR_LENDARIO + 1) * 3600;
        $segundosEpico = (LEITOR_EPICO + 1) * 3600;
        $segundosColossal = (LEITOR_COLOSSAL + 1) * 3600;

<<<<<<< HEAD
        return $this->readCALL("nivel($segundosRaro, $segundosLendario,$segundosEpico,$segundosColossal)");
=======
        return $this->readCALL("nivel('$segundosRaro', '$segundosLendario',' $segundosEpico', '$segundosColossal')");
>>>>>>> e40b4c097f0819c99998c868a48143854e846cea
    }


    public function listarMaisLidos($ano, $mes)
    {
        $places = ['livro.idLivro', 'livro.tituloLivro', '(select  sum(time_to_sec(timediff(leituralivro.dataLeituraFim, leituralivro.dataLeitura))) 
        from leituralivro where leituralivro.idLivro = livro.idLivro and
        year(leituralivro.dataLeituraFim) = ' . $ano . ' and year(leituralivro.dataLeitura) = ' . $ano . '
        and month(leituralivro.dataLeituraFim) = ' . $mes . ' and month(leituralivro.dataLeitura) = ' . $mes . '
        ) as tempoLeituraSegundos', '(((select  sum(time_to_sec(timediff(leituralivro.dataLeituraFim, leituralivro.dataLeitura))) 
        from leituralivro where leituralivro.idLivro = livro.idLivro and
        year(leituralivro.dataLeituraFim) = ' . $ano . ' and year(leituralivro.dataLeitura) = ' . $ano . '
        and month(leituralivro.dataLeituraFim) = ' . $mes . ' and month(leituralivro.dataLeitura) = ' . $mes . '
        )/60)/60) as tempoLeituraHora'];
        $innerjoin = null;
        $where = null;
        $orderby = 'tempoLeituraSegundos desc';
        $limit = 30;
        $offset = null;
        $groupby = null;
        return $this->read('livro', $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
    }
}
