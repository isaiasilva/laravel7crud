<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Eleitor;
use Redirect,Response;

class EleitorController extends Controller
{

	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/


        public function index()
	{
		$eleitores = Eleitor::latest()->paginate(10);
		return view('eleitores.index',compact('eleitores'))->with('i', (request()->input('page', 1) - 1) * 10);
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function create()
	{
		return view('eleitor.create');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @return \Illuminate\Http\Response
	*/

	public function store(Request $request)
	{

		$r=$request->validate([
		'nome' => 'required',
		'telefone' => 'required',
                'localidade' => 'required',
		'endereco' => 'required',
		]);

		$custId = $request->cust_id;
		Eleitor::updateOrCreate(['id' => $custId],['nome' => $request->nome, 'telefone' => $request->telefone,'localidade'=>$request->localidade,'endereco' => $request->endereco]);

		if(empty($request->cust_id))
			$msg = 'Eleitor criado com sucesso!';
		else
			$msg = 'Eleitor atualizado com sucesso';
		return redirect()->route('eleitores.index')->with('success',$msg);
	}

	/**
	* Display the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function show(Eleitor $eleitor)
	{
		return view('eleitores.show',compact('eleitor'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/
	
	public function edit($id)
	{
		$where = array('id' => $id);
		$eleitor = Eleitor::where($where)->first();
		return Response::json($eleitor);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param \Illuminate\Http\Request $request
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function update(Request $request)
	{

	}

	/**
	* Remove the specified resource from storage.
	*
	* @param int $id
	* @return \Illuminate\Http\Response
	*/

	public function destroy($id)
	{
		$cust = Eleitor::where('id',$id)->delete();
		return Response::json($cust);
	}
}