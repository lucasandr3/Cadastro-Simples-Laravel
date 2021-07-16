<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function index()
    {
        return view('empresa');
    }

    public function addAction(Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'uf' => 'required',
            'nome' => 'required|min:5',
            'cnpj' => 'required|regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/'
        ]);

        if (!$validator->fails()) {

            $uf   = $request->input('uf');
            $nome = $request->input('nome');
            $cnpj = $request->input('cnpj');

            $cnpjExiste = Empresa::where('documento', $cnpj)->count();

            if ($cnpjExiste === 0) {

                $novaEmpresa = new Empresa();
                $novaEmpresa->uf = $uf;
                $novaEmpresa->nome = $nome;
                $novaEmpresa->documento = $cnpj;
                $novaEmpresa->save();
            } else {
                return redirect()->route('empresa')->withErrors('CNPJ já esta Cadastrado.')->withInput();
            }
        } else {
            return redirect()->route('empresa')->withErrors($validator)->withInput();
            //$request->session()->flash('error', 'Dados Incorretos.');
            //return redirect('/');
        }

        return redirect()->route('empresa')->withErrors('Empresa Cadastrada.')->withInput();
    }
}
