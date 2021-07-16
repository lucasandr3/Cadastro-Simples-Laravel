@extends('template')

@section('title', 'Cadastro de Fornecedores')

@section('content')

<h1 class="title-page">Cadastro de Fornecedores</h1>

<div class="alerts">
    @if ($errors->any())
    @foreach($errors->all() as $error)
    <li class="alert">{{$error}}</li>
    @endforeach
    @endif
</div>

<form class="form" action="{{url('/novo/fornecedor')}}" method="POST">
    @method('POST')
    @csrf
    <label for="empresa">Empresa</label>
    <select name="empresa" id="">
        <option>Escolha uma Empresa</option>
        @foreach($empresas as $empresa)
        <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
        @endforeach
    </select>

    <label for="Nome">Nome Fornecedor *</label>
    <input type="text" name="nome_fornecedor" id="" placeholder="Nome do Fornecedor" />

    <label for="CNPJ">CPF / CNPJ *</label>
    <input type="text" name="documento_fornecedor" class="cpf_cnpj" placeholder="CPF ou CNPJ do Fornecedor" />

    <label for="CNPJ">Telefone *</label>
    <input type="text" name="telefone" class="phone" placeholder="Digite o Telefone" />

    <div class="pessoa_fisica">
        <label for="CNPJ">RG *</label>
        <input type="text" name="rg" class="rg" placeholder="Informe o RG" />

        <label for="CNPJ">Data de Nascimento *</label>
        <input type="date" name="dt_nascimento" />
    </div>

    <input type="submit" value="Cadastrar Fornecedor">
</form>

@endsection