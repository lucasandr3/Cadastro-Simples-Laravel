@extends('template')

@section('title', 'Cadastro de Empresas')

@section('content')

<h1 class="title-page">Cadastro de Empresas</h1>

<div class="alerts">
    @if ($errors->any())
    @foreach($errors->all() as $error)
    <li class="alert">{{$error}}</li>
    @endforeach
    @endif
</div>

<form class="form" action="{{url('/empresa')}}" method="POST">
    @method('POST')
    @csrf
    <label for="uf">UF - (Estado) *</label>
    <select name="uf" id="uf">
        <option value="AC">Acre</option>
        <option value="AL">Alagoas</option>
        <option value="AP">Amapá</option>
        <option value="AM">Amazonas</option>
        <option value="BA">Bahia</option>
        <option value="CE">Ceará</option>
        <option value="DF">Distrito Federal</option>
        <option value="ES">Espírito Santo</option>
        <option value="GO">Goiás</option>
        <option value="MA">Maranhão</option>
        <option value="MT">Mato Grosso</option>
        <option value="MS">Mato Grosso do Sul</option>
        <option value="MG">Minas Gerais</option>
        <option value="PA">Pará</option>
        <option value="PB">Paraíba</option>
        <option value="PR">Paraná</option>
        <option value="PE">Pernambuco</option>
        <option value="PI">Piauí</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="RN">Rio Grande do Norte</option>
        <option value="RS">Rio Grande do Sul</option>
        <option value="RO">Rondônia</option>
        <option value="RR">Roraima</option>
        <option value="SC">Santa Catarina</option>
        <option value="SP">São Paulo</option>
        <option value="SE">Sergipe</option>
        <option value="TO">Tocantins</option>
    </select>

    <label for="Nome Fantasia">Nome Fantasia *</label>
    <input type="text" name="nome" id="" placeholder="Nome Fantasia" />

    <label for="CNPJ">CNPJ *</label>
    <input type="text" class="cnpj" name="cnpj" data-mask="00/00/0000" />

    <input type="submit" value="Cadastrar Empresa">
</form>

@endsection