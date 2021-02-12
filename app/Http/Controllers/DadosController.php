<?php


namespace App\Http\Controllers;

use App\Models\Formularios;
use Illuminate\Http\Request;

class DadosController extends Controller
{
    public function index()
    {
        $dados = Formularios::all();

        return view('formulario.index', compact('dados'));
    }
    public function create(){
        return view('formulario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email:rfc,dns',
            'telefone' => 'required',
            'endereco' => 'required',
            'curriculo' => 'required|file|max:500|mimes:pdf,doc,docx,txt'
        ]);

        $nome = $request->nome;
        $email = $request->email;
        $telefone = $request->telefone;
        $endereco = $request->endereco;
        $curriculo = $request->file('curriculo')->store('curriculos');
        $nome_arquivo = $request->curriculo->getClientOriginalName();

        $dados = new Formularios();
        $dados->nome = $nome;
        $dados->email = $email;
        $dados->telefone = $telefone;
        $dados->endereco = $endereco;
        $dados->ip = $request->getClientIp();

        $dados->curriculo = "storage/app/public/curriculos/{$nome_arquivo}";
        $dados->save();
        unset($dados);

        $email = new \App\Mail\NovoCadastro(
            $request->nome,
            $request->email,
            $request->telefone,
            $request->endereco
        );

        $email->subject = "Novo cadastro realizado";

        $user = (object)[
            'email' => $request->email,
            'name' => $request->nome
        ];

        \Illuminate\Support\Facades\Mail::to($user)->send($email);

        return $this->index();
    }
}
