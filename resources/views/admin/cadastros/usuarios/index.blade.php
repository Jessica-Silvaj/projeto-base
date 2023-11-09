@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-people"></i> Usuários</h1>
                <p>Todos os usuários cadastrados</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item">Cadastros</li>
                <li class="breadcrumb-item active"><a href="{{ route('cadastro.usuario.index') }}">Usuarios</a></li>
            </ul>
        </div>

        <div class="col-md-12">
            <div class="tile">
              <div class="tile-title-w-btn">
                <h3 class="title">Usuários</h3>
                <p><a class="btn btn-primary icon-btn" href="{{ route('cadastro.usuario.edit')}}"><i class="bi bi-plus-square me-2"></i>Novo</a></p>
              </div>
              <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                      <thead>
                        <tr>
                          <th class="text-center">Matricula</th>
                          <th class="text-center">Nome</th>
                          <th class="text-center">Telefone</th>
                          <th class="text-center">Setor</th>
                          <th class="text-center">Ativo</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($listUsuario as $item )
                        <tr>
                            <td class="text-center">{{ $item->cod_matricula }}</td>
                            <td class="text-center">{{ $item->nome }}</td>
                            <td class="text-center">{!! empty($item->telefone) ? '-' : \App\Models\Utils::telefone($item->telefone)!!}</td>
                            <td class="text-center">{{ $item->setor->nome }}</td>
                            <td class="text-center">{{ $item->ativo == 1 ? 'Sim' : 'Não'}}</td></td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="{{ route('cadastro.usuario.edit', [$item->id]) }}"><i class="bi bi-pencil-square me-2"></i>Editar</a>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="{{ route('cadastro.usuario.index') }}"><i class="bi bi-x-octagon me-2"></i>Excluir</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
    </main>
@endsection
@section('script')

@endsection
