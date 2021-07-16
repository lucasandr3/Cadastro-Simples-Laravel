@extends('template')

@section('title', 'Lista de Fornecedores')

@section('content')

<h1 class="title-page">Lista de Fornecedores</h1>

<!-- <div class="alerts">
    <p>Todos os Campos marcados com * são obrigatórios</p>
</div> -->

<div class="box">
    <div class="box-head">
        <p>Mostrar Por:</p>
        <form action="{{url('/fornecedores')}}" method="GET">
            @method('GET')
            @csrf
            <div style="display: flex;justify-content: space-between;">
                <div>
                    <input type="text" name="search_nome" id="" placeholder="pesquisar por nome" style="width: 200px;" />
                    <input type="submit" value="Pesquisar" style="width: 100px;" />
                </div>
                <div>
                    <input type="text" name="search_doc" class="cpf_cnpj" placeholder="pesquisar CPF ou CNPJ" style="width: 200px;" />
                    <input type="submit" value="Pesquisar" style="width: 100px;" />
                </div>
                <div>
                    <input type="date" name="search_data" id="" style="width: 200px;" />
                    <input type="submit" value="Pesquisar" style="width: 100px;" />
                </div>
            </div>
        </form>
    </div>
    <div class="box-content">
        <table>
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Nome</th>
                    <th>CPF / CNPJ</th>
                    <th>Telefone</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fornecedores as $fornecedor)
                <tr>
                    <td>{{$fornecedor->nome}}</td>
                    <td>{{$fornecedor->nome_fornecedor}}</td>
                    <td>{{$fornecedor->documento_fornecedor}}</td>
                    <td>{{$fornecedor->telefone}}</td>
                    <td>{{date('d/m/Y',strtotime($fornecedor->data_cadastro))}} às {{date('H:i:s',strtotime($fornecedor->data_cadastro))}} Hs</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection