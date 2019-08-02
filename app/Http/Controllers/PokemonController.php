<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NovoPokemon;
use App\Notifications\PokedexCheia;


use App\Pokemon;
use App\User;

class PokemonController extends Controller
{
    //Controller para resolução do exercicio.
    //Completem as funções com as notificações necessárias.
	public function pokemonCapturado(Request $request, $user_id){
		//Pega o usuário com o id passado
		$user = User::find($user_id);

		//novo Pokemon é atribuído ao Usuario
		$novoPokemon = new Pokemon;
		$novoPokemon->nome = $request->nome;
		$novoPokemon->tipo_1 = $request->tipo_1;
		$novoPokemon->genero = $request->genero;
		$novoPokemon->user_id = $user_id;
		$novoPokemon->save();
		//qtdPokedex recebe +1
		$user->qtdPokedex = $user->qtdPokedex+1;
		$user->save();

		$user->notify(new NovoPokemon($novoPokemon));
		
		if($user->qtdPokedex >= 75 && $user->qtdPokedex <100){
			$user->notify(new PokedexCheia());
		}


		//Caso a qtdPokedex seja igual a 100...
		if($user->qtdPokedex == 100){
			//mensagem de erro, pois não é possível adicionar um novo pokemon
			$mensagem = 'POKEDEX CHEIA. Retire um pokemon para continuar.';
			return $mensagem;
		}

		//Será necessário notificar o usuário por e-mail sobre seu novo Pokemon
		//No email devem estar os dados da nova instancia do pokemon
		//O nome do App deve estar em cor branca
		//O email deve ter a cor vermelha na barra de cima 
		//e a cor branca na barra de baixo
		//Editem o corpo do email e substituam o "Regards" padrão por outras palavras, como "Att", "Abraços", etc.
		//		   [ NECESSARIO COMPLETAR ]



		//mensagem de sucesso é retornada ao usuario
		$mensagem = 'Pokemon adicionado.';
		return $mensagem;
	}
}
