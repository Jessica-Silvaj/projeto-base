<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <li><a class="app-menu__item {{ (request()->is('painel*')) ? 'active': '' }}" href="{{ route('painel.index') }}"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Painel de Controle</span></a></li>
        <li class="treeview"><a class="app-menu__item {{ (request()->is('cadastros*')) ? 'active': '' }}" href="#" data-toggle="treeview"><i class="app-menu__icon bi  bi-journal-plus"></i><span class="app-menu__label">Cadastros</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{ route('cadastro.usuario.index') }}"><i class="icon bi bi-people"></i>Usuários</a></li>
          </ul>
        </li>
      </ul>
    </aside>
