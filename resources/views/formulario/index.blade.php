@extends('layout')

@section('cabecalho')
    Lista de cadastrados
@endsection

@section('conteudo')
    <a class="btn btn-primary mb-2" href="/inscricao">Inscrição</a>

    <table class="table table-bordered table-stripped text-center">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Local currículo</th>
                <th>IP</th>
                <th>Atualizado em</th>
                <th>Criado em</th>
            </tr>
        </thead>

        <tbody>
        @foreach($dados as $dado)
            <tr>
                <td>{{ $dado->nome }}</td>
                <td>{{ $dado->email }}</td>
                <td>{{ $dado->telefone }}</td>
                <td>{{ $dado->endereco }}</td>
                <td>{{ $dado->curriculo }}</td>
                <td>{{ $dado->ip }}</td>
                <td>{{ $dado->updated_at }}</td>
                <td>{{ $dado->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
