<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Usuarios extends BaseController
{

	private $usuarioModel;
	public function __construct()
	{
		$this->usuarioModel = new \App\Models\UsuarioModel();
	}

	/**
	 * Chama a pagina Usuarios
	 *
	 * @return void
	 */
	public function index()
	{

		$data = [
			'titulo' => ' | Usuarios',
			'subtitulo' => 'Controle de Usuarios e Permissões'
		];
		return view('Usuarios/index', $data);
	}

	/**
	 * Função recupera Usuário com requisição em ajax
	 *
	 * @return void
	 */
	public function recuperaUsuarios()
	{
		if (!$this->request->isAJAX()) {
			return redirect()->back();
		}

		$atributos = [
			'id',
			'nome',
			'email',
			'ativo',
			'imagem',
		];

		$usuarios = $this->usuarioModel->select($atributos)->findAll();

		// echo'<pre>';
		// print_r($usuarios);
		// exit;

		//Vai receber o array de objetos de usuarios abaixo
		$data = [];

		foreach ($usuarios as $usuario) {
			$data[] = [
				'imagem' => $usuario->imagem,
				'nome' => anchor("usuarios/exibir/$usuario->id", esc($usuario->nome), 'title="Exibir usuario ' . esc($usuario->nome) . '"'),
				'email' => $usuario->email,
				'ativo' => $usuario->ativo == true ? '<i class="fa fa-unlock text-success"></i>&nbsp Ativo' : '<i class="fa fa-lock text-danger"></i>&nbsp Inativo',

			];
		}

		$retorno = [
			'data' => $data,
		];

		//  echo'<pre>';
		//  print_r($retorno);
		//  exit;

		return $this->response->setJSON($retorno);
	}

	/**
	 * Metodo Exibir usuário
	 *
	 * @param integer|null $id
	 * @return void
	 */
	public function exibir(int $id = null)
	{
		
		$usuario = $this->buscaUsuarioOu404($id);

		//dd($usuario);

		$data = [
			'titulo' => " | ".esc($usuario->nome),
			'subtitulo' => "Detalhes do usuario ".esc($usuario->nome),
			'usuario'=> $usuario,
		];

		return view('Usuarios/exibir', $data);
	}

	/**
	 *Editando Usuário
	 *
	 * @param integer|null $id
	 * @return void
	 */
	public function editar(int $id = null)
	{
		

		$usuario = $this->buscaUsuarioOu404($id);

		//dd($usuario);

		$data = [
			'titulo' => " | ".esc($usuario->nome),
			'subtitulo' => "Editar usuario ".esc($usuario->nome),
			'usuario'=> $usuario,
		];

		return view('Usuarios/editar', $data);
	}

	/**
	 * Metodo busca usuario no db
	 * METODO PRIVADO
	 * @param integer $id
	 * @return Exceptions|object
	 */
	private function buscaUsuarioOu404(int $id = null)
	{

		

		if(!$id || !$usuario = $this->usuarioModel->withDeleted(true)->find($id)){
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não foi encontrado o usuário $id!");
		}

		return $usuario;
	}
}
