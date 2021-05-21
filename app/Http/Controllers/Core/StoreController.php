<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Core\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()// listar todos os dados
    {
        $data = Store::all(); //  mesma coisa que: select * from...
        
        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)// gravar os dados no banoc
    {
        $data = $request ->all();// grava tudo q passar no input, ou seja, essa função é para puxar quando atributo do banco

        Store:: create($data);// para mandar para o banco de dados

        return response()->json(['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//buscar um registro especifico
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataRequest = $request->all();
        $data = Store::findOrFail($id); //findOrFail = select * from where ...
        $data->update($dataRequest);// acessando a pagina e passando tudo q quer atualizar
        
        return response()->json(['msg' => 'Dados atualizados com sucesso!', 'data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Store::find($id);
        $data ->delete();// para excluir

        return response()->json(['message' => 'Registro excluido com sucesso', 'data' => $data]);
    }
}
