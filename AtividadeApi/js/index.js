divContent = document.getElementById('content-pokemons');

console.log(divContent);

async function BuscarPokemons(){

    const url = "https://pokeapi.co/api/v2/pokemon/";
    for(let i=1;i<=251;i++){
    InformacoesPokemon(url,i)
  }
}
async function InformacoesPokemon(url,id){
    console.log(url)
    try {
      const response = await fetch(url+id);
      if (!response.ok) {
        throw new Error(`Response status: ${response.status}`);
      }
  
      const pokemonInfo = await response.json();
      var color;
      console.log(pokemonInfo);
      if(pokemonInfo.types[0].type.name == 'grass'){
        color = "green-500"
      }
      else if(pokemonInfo.types[0].type.name == 'water'){
        color = "sky-400"
      }
      else if(pokemonInfo.types[0].type.name == 'fire'){
        color = "orange-500"
      }
      else if(pokemonInfo.types[0].type.name == 'bug'){
        color = "emerald-700"
      }
      else if(pokemonInfo.types[0].type.name == 'normal'){
        color = "slate-400"
      }
      
           divContent.innerHTML += `<div class="col-span-2"><div class="card justify-items-center bg-${color} rounded-lg"><img class="w-full h-auto" src="${pokemonInfo.sprites.front_default}" alt="" srcset=""><h1 class="text-white capitalize">${pokemonInfo.name}</h1></div></div>`
          
    } catch (error) {
      console.error(error.message);
    }
}

BuscarPokemons()