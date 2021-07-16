<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Fornecedor;
use App\Models\Empresa;

class FornecedorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('search_nome')) {
            $fornecedores = DB::table('fornecedores')
                ->join('empresas', 'fornecedores.empresa', '=', 'empresas.id')
                ->where('nome_fornecedor', 'LIKE', '%' . $request->get('search_nome') . '%')
                ->get();
        } else if ($request->get('search_doc')) {
            $fornecedores = DB::table('fornecedores')
                ->join('empresas', 'fornecedores.empresa', '=', 'empresas.id')
                ->where('documento_fornecedor', 'LIKE', '%' . $request->get('search_doc') . '%')
                ->get();
        } else if ($request->get('search_data')) {
            $fornecedores = DB::table('fornecedores')
                ->join('empresas', 'fornecedores.empresa', '=', 'empresas.id')
                ->where('data_cadastro', 'LIKE', '%' . $request->get('search_data') . '%')
                ->get();
        } else {
            $fornecedores = DB::table('fornecedores')
                ->join('empresas', 'fornecedores.empresa', '=', 'empresas.id')
                ->get();
        }

        return view('fornecedores', [
            'fornecedores' => $fornecedores
        ]);
    }

    public function register()
    {
        $empresas = Empresa::all();

        return view('fornecedor', [
            'empresas' => $empresas
        ]);
    }

    public function addAction(Request $request)
    {
        $array = ['error' => ''];

        $empresa = Empresa::where('id', $request->input('empresa'))->first();
        $fornecedor = Fornecedor::where('');

        $validator = validator::make($request->all(), [
            'empresa' => 'required',
            'nome_fornecedor' => 'required|min:5',
            'documento_fornecedor' => 'required|min:14|unique:fornecedores',
            'telefone' => 'required|min:13',
        ]);

        if (!$validator->fails()) {

            $empresa_fornecedor = $request->input('empresa');
            $nome = $request->input('nome_fornecedor');
            $doc = $request->input('documento_fornecedor');
            $telefone = $request->input('telefone');
            $rg = $request->input('rg');
            $data_nascimento = $request->input('dt_nascimento');

            if ($empresa->uf === 'PR') {

                $dt_nascimento_verify = date('Y', strtotime($request->input('dt_nascimento')));
                $data_atual = date("Y");
                $idade = $data_atual - $dt_nascimento_verify;

                if ($idade < 18) {
                    return redirect()->route('fornecedor')->withErrors('Fornecedor não pode ser menor de idade.')->withInput();
                } else {
                    $novoFornecedor = new Fornecedor();
                    $novoFornecedor->empresa = $empresa_fornecedor;
                    $novoFornecedor->nome_fornecedor = $nome;
                    $novoFornecedor->documento_fornecedor = $doc;
                    $novoFornecedor->data_cadastro = date("Y-m-d H:i:s");
                    $novoFornecedor->telefone = $telefone;
                    $novoFornecedor->rg = $rg;
                    $novoFornecedor->data_nascimento = $data_nascimento;
                    $novoFornecedor->save();

                    return redirect()->route('fornecedor')->withErrors('Fornecedor cadastrado.')->withInput();
                }
            } else {


                $novoFornecedor = new Fornecedor();
                $novoFornecedor->empresa = $empresa_fornecedor;
                $novoFornecedor->nome_fornecedor = $nome;
                $novoFornecedor->documento_fornecedor = $doc;
                $novoFornecedor->data_cadastro = date("Y-m-d H:i:s");
                $novoFornecedor->telefone = $telefone;
                $novoFornecedor->rg = $rg;
                $novoFornecedor->data_nascimento = $data_nascimento;
                $novoFornecedor->save();

                return redirect()->route('fornecedor')->withErrors('Fornecedor cadastrado.')->withInput();
            }
        } else {
            return redirect()->route('fornecedor')->withErrors($validator)->withInput();
        }
    }
}
