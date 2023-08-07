<aside class="left-sidebar" data-sidebarbg="skin5">
  <style>
    .text-red {
      color: #ff2b2b !important;
    }
<<<<<<< HEAD

    .text-blue {
      color: #00FFF2 !important;
=======
    .text-blue {
      color: #0737f5 !important;
>>>>>>> e40b4c097f0819c99998c868a48143854e846cea
    }
  </style>
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4" id="homeSubmenu">
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= DOMINIO ?>home" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow text-blue" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-chart text-blue"></i><span class="hide-menu">Relatórios </span></a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="<?= DOMINIO ?>relatorio/top10" class="sidebar-link"><i class="mdi mdi-star text-blue"></i><span class="hide-menu text-blue"> Top 10 Mensal </span></a>
            </li>
            <li class="sidebar-item">
              <a href="<?= DOMINIO ?>relatorio/maisLidos" class="sidebar-link"><i class="mdi mdi-bookmark text-blue"></i><span class="hide-menu text-blue"> Livros mais Lidos </span></a>
            </li>
            <li class="sidebar-item">
              <a href="<?= DOMINIO ?>relatorio/avancoNivel" class="sidebar-link"><i class="mdi mdi-elevation-decline text-blue"></i><span class="hide-menu text-blue"> Avanço de Nível </span></a>
            </li>
            <li class="sidebar-item">
              <a href="<?= DOMINIO ?>relatorio/emprestimo" class="sidebar-link"><i class="mdi mdi-bookmark-check text-blue"></i><span class="hide-menu text-blue"> Empréstimos </span></a>
            </li>
            <li class="sidebar-item">
<<<<<<< HEAD
              <a href="<?= DOMINIO ?>relatorio/emprestimoVencido" class="sidebar-link"><i class="mdi mdi-bookmark-check text-blue"></i><span class="hide-menu text-blue"> Empréstimos Vencidos</span></a>
            </li>
            <li class="sidebar-item">
              <a href="<?= DOMINIO ?>relatorio/tempoLeitura" class="sidebar-link"><i class="mdi mdi-clock text-blue"></i><span class="hide-menu text-blue"> Tempo de Leitura </span></a>
            </li>
            <li class="sidebar-item">
              <a href="<?= DOMINIO ?>relatorio/tempoLeituraDia" class="sidebar-link"><i class="mdi mdi-clock text-blue"></i><span class="hide-menu text-blue"> Tempo de Leitura (DIA)</span></a>
            </li>
=======
              <a href="<?= DOMINIO ?>relatorio/tempoLeitura" class="sidebar-link"><i class="mdi mdi-clock text-blue"></i><span class="hide-menu text-blue"> Tempo de Leitura </span></a>
            </li>
>>>>>>> e40b4c097f0819c99998c868a48143854e846cea
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= DOMINIO ?>autor/listagem" aria-expanded="false"><i class="mdi mdi-account-edit"></i><span class="hide-menu">Autor</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= DOMINIO ?>categoria/listagem" aria-expanded="false"><i class="mdi mdi-chart-timeline"></i><span class="hide-menu">Categoria</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= DOMINIO ?>editora/listagem" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Editora</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark" href="<?= DOMINIO ?>leitor/listagem" aria-expanded="false">
            <i class="mdi mdi-account"></i><span class="hide-menu">Leitor </span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark" href="<?= DOMINIO ?>livro/listagem" aria-expanded="false">
            <i class="mdi mdi-book"></i><span class="hide-menu">Livros </span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= DOMINIO ?>tipoleitor/listagem" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Tipo de Leitor</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= DOMINIO ?>emprestimo/listagem" aria-expanded="false"><i class="mdi mdi-cart-outline"></i><span class="hide-menu">Empréstimo</span></a>
        </li>

<<<<<<< HEAD




        <li class="sidebar-item">
          <a class="sidebar-link has-arrow text-blue" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-help text-blue"></i><span class="hide-menu">Perguntas</span></a>
          <ul aria-expanded="false" class="collapse first-level">

            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= DOMINIO ?>perguntas/listagem" aria-expanded="false"><i class="mdi mdi-help text-blue"></i><span class="hide-menu text-blue">Perguntas</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= DOMINIO ?>resposta" aria-expanded="false"><i class="mdi mdi-help text-blue"></i><span class="hide-menu text-blue">Respostas</span></a>
            </li>
          </ul>
        </li>

        <hr>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link text-red" href="<?= DOMINIO ?>paginaspainel/listagem" aria-expanded="false"><i class="mdi mdi-lock text-red"></i><span class="hide-menu">Páginas Painel</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link text-red" href="<?= DOMINIO ?>paginasusuario" aria-expanded="false"><i class="mdi mdi-lock-outline text-red"></i><span class="hide-menu">Página Usuário</span></a>
        </li>

=======
        <hr>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link text-red" href="<?= DOMINIO ?>paginaspainel/listagem" aria-expanded="false"><i class="mdi mdi-lock text-red"></i><span class="hide-menu">Páginas Painel</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link text-red" href="<?= DOMINIO ?>paginasusuario" aria-expanded="false"><i class="mdi mdi-lock-outline text-red"></i><span class="hide-menu">Página Usuário</span></a>
        </li>

>>>>>>> e40b4c097f0819c99998c868a48143854e846cea
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link  text-red" href="<?= DOMINIO ?>usuario/listagem" aria-expanded="false"><i class="mdi mdi-account-key  text-red"></i><span class="hide-menu">Usuário</span></a>
        </li>
      </ul>
    </nav>
  </div>
</aside>