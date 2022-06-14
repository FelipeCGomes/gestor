<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioFakerSeeder extends Seeder
{
	public function run()
	{
		$usuarioModel = new \App\Models\UsuarioModel();

		$faker = \Faker\Factory::create();

		$criarUsuarios = 10000;

		$usuariosPush = [];

		for ($i = 0; $i < $criarUsuarios; $i++) {
			array_push($usuariosPush, [
				'nome' => esc($faker->unique()->name),
				'email' => $faker->unique()->email(),
				'password_hash' => '123456', // alterar o faker quando conhecermos a criptografia de senha
				'ativo' => $faker->numberBetween(0,1),

			]);
		}

		// echo'<pre>';
		// print_r($usuariosPush);
		// exit;

		$usuarioModel->skipValidation() //pulando a validação dos dados
					->protect(false) //desativado podemos inserir dados que não está no array AllowedFields(somente em desenvolvimento)
					->insertBatch($usuariosPush);//inserindo todos os usuarios dentro do array $usuariosPush em uma unica linha

		 echo"Foi criado $criarUsuarios com sucesso";
	}
}
