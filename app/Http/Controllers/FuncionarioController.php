<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Funcionario;
use Redirect;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index($id)
    {
        $empresa = Empresa::findOrFail($id);
        $funcionario = Funcionario::where('empresa_id', $empresa->id)->paginate(10);
        return view('funcionarios.list', ['empresas' => $empresa, 'funcionarios' => $funcionario]);
    }

    public function create($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('funcionarios.form', ['empresas' => $empresa]);
    }

    public function store(Request $request)
    {
        $funcionario = new Funcionario();
        $funcionario = $funcionario->create($request->all());

        return redirect::to('/empresas/funcionarios/'.$request->empresa_id);
    }

    public function edit($id_emp, $id_fun)
    {
        $empresa = Empresa::findOrFail($id_emp);
        $funcionario = Funcionario::findOrFail($id_fun);
        return view('funcionarios.form', ['empresas' => $empresa, 'funcionarios'=>$funcionario]);
    }

    public function update($id, Request $request)
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->all());
        return redirect::to('/empresas/funcionarios/'. $funcionario->empresa_id);
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $id_emp = $funcionario->empresa_id;
        $funcionario->delete();
        return redirect::to('/empresas/funcionarios/'.$id_emp);
    }

    public function show_funcionario($id, $id_emp)
    {
        $funcionario = Funcionario::findOrFail($id);
        $empresa = Empresa::findOrFail($id_emp);
        return view('funcionarios.funcionario', ['empresas'=>$empresa, 'funcionario'=>$funcionario]);
    }

    public function list_funcionarios($id_emp)
    {
        $empresa = Empresa::findOrFail($id_emp);
        $funcionario = Funcionario::where('empresa_id', $empresa->id)->get();
        return ($funcionario);
    }
}
