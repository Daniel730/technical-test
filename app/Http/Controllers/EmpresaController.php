<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Redirect;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = Empresa::paginate(10);
        return view('empresa.index', ['empresas' => $empresa]);
    }

    public function create()
    {
        return view('empresa.form');
    }

    public function store(Request $request)
    {
        $empresa = new Empresa();
        $nome_file = null;
        $url_logo = null;
        if($request->hasFile('logo') && $request->file('logo')->isValid()) {

            $imagem = $request->file('logo');

            $nome = uniqid(date('HisYmd'));

            $extensao = $request->logo->extension();

            $nome_file = "{$nome}.{$extensao}";

            $upload = $request->logo->storeAs('empresas_logo', $nome_file);

            $empresa = $empresa->create([
                'nome' => $request->nome,
                'email'=> $request->email,
                'website'=> $request->website,
                'logo'=> $upload
            ]);
        }

        return redirect::to('/empresas');
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresa.form', ['empresas' => $empresa]);
    }

    public function update($id, Request $request)
    {
        $empresa = Empresa::findOrFail($id);
        $nome_file = null;
        $url_logo = null;
        if($request->hasFile('logo') && $request->file('logo')->isValid()) {

            $imagem = $request->file('logo');

            $nome = uniqid(date('HisYmd'));

            $extensao = $request->logo->extension();

            $nome_file = "{$nome}.{$extensao}";

            $upload = $request->logo->storeAs('empresas_logo', $nome_file);


            $empresa = $empresa->update([
                'nome' => $request->nome,
                'email'=> $request->email,
                'website'=> $request->website,
                'logo'=> $upload
            ]);
        } else {
            $empresa = $empresa->update([
                'nome' => $request->nome,
                'email'=> $request->email,
                'website'=> $request->website
            ]);
        }
        return redirect::to('/empresas');
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return redirect::to('/empresas');
    }

    public function list_empresas()
    {
        $empresa = Empresa::get();
        return ($empresa);
    }
}
