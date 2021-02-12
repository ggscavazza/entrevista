@extends('layout')

@section('cabecalho')
    Formulário
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" required>
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" name="endereco" id="endereco" required>
        </div>

        <div class="form-group">
            <label for="curriculo">Currículo</label>
            <input type="file" class="form-control" name="curriculo" id="curriculo" required>
            <small id="curriculoHelp" class="form-text text-muted">
                Arquivo deve estar em uma destas extensões: PDF, DOC, DOCX ou TXT.
                <br>Tamanho máximo 500kb
            </small>
        </div>

        <button class="btn btn-success">Salvar</button>
    </form>
@endsection
