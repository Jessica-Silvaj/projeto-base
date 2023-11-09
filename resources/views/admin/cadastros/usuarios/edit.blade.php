@extends('layouts.master')
@section('content')
    <main class="app-content">
        @include('layouts.message')
        <div class="app-title">
            <div>
                <h1><i class="bi bi-people"></i> Usuários</h1>
                <p>Todos os usuários cadastrados</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item">Cadastros</li>
                <li class="breadcrumb-item"><a>Usuarios</a></li>
                @if ($id == 0)
                    <li class="breadcrumb-item active"><a href="{{ route('cadastro.usuario.edit')}}">Novo</a></li>
                @else
                <li class="breadcrumb-item active"><a href="{{ route('cadastro.usuario.edit')}}">Editar</a></li>
                @endif
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    @if ($id == 0)
                        <h3>Cadastrar Usuários</h3>
                    @else
                        <h3>Editar Usuários</h3>
                    @endif
                    <form action="{{ route('cadastro.usuario.store') }}" method="POST" id="frmSearchUser" name="frmSearchUser">
                        @csrf
                        <div class="tile-body">
                            <input type="hidden" id="id" name="id" value="{{ $objUsuario?->id }}"/>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label" for="matricula">Matricula</label>
                                    <input class="form-control" id="matricula" name="matricula" type="text" aria-describedby="matriculaHelp" value="{{ old('matricula', $objUsuario->cod_matricula) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="nome">Nome</label>
                                    <input class="form-control" id="nome" name="nome" type="text" aria-describedby="nomeHelp" value="{{ old('nome', $objUsuario->nome) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="telefone">Telefone</label>
                                    <input class="form-control" id="telefone" name="telefone" type="text" aria-describedby="telefoneHelp" value="{!! old('telefone', \App\Models\Utils::telefone($objUsuario->telefone))!!}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="senha">Senha</label>
                                    <input class="form-control" id="senha" name="senha" type="password" aria-describedby="senhaHelp" value="" autocomplete="new-password">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="ativo">Ativo</label>
                                    <select class="form-control" id="ativo" name="ativo">
                                        <option value="1" {{ $objUsuario->ativo == 1 ? 'selected': '' }}>Sim</option>
                                        <option value="0" {{ $objUsuario->ativo == 0 ? 'selected': '' }}>Não</option>
                                    </select>
                                  </div>
                                  <div class="col-md-4">
                                      <label class="form-label" for="setor_id">Setor</label>
                                      <select class="form-control" id="setor_id" name="setor_id">
                                        <option value="">Selecione</option>
                                        @foreach ($setor as $item )
                                            <option value="{{ $item->id }}" {{ $item->id == $objUsuario->setor_id ? 'selected' : '' }}>{{ $item->nome }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Salvar</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="{{ route('cadastro.usuario.index') }}"><i class="bi bi-arrow-return-left me-2"></i>Voltar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
