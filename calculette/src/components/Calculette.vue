<template>
  <div class="global">
    <h1>{{ msg }}</h1>
    <div class="calculette">

      <div class="affichage">
        <div class="lignes-affichage">{{number || '0'}}</div>
      </div>

      <div class="lignes calculette-ligne1">
        <div @click="clear">C</div>
        <div @click="remove">Del</div>
      </div>
      
      <div class="lignes calculette-ligne2">
        <div @click="append('7')">7</div>
        <div @click="append('8')">8</div>
        <div @click="append('9')">9</div>
        <div @click="multiplication">X</div>
      </div>

      <div class="lignes calculette-ligne3">
        <div @click="append('4')">4</div>
        <div @click="append('5')">5</div>
        <div @click="append('6')">6</div>
        <div @click="substraction">-</div>
      </div>

      <div class="lignes calculette-ligne4">
        <div @click="append('1')">1</div>
        <div @click="append('2')">2</div>
        <div @click="append('3')">3</div>
        <div @click="addition">+</div>
      </div>

      <div class="lignes calculette-ligne5">
        <div @click="append('0')">0</div>
        <div @click="dot">.</div>
        <div @click="division">/</div>
        <div @click="equal">=</div>
      </div>
    </div>

    <button @click="resultat">Afficher historique résultats</button>
    <div class="historique-affichage">{{lignes}}</div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Calculette',
  props: {
    msg: String
  },
  data(){
    return{
      prevNum: null,
      number: '',
      operator: null,
      operatorClicked: false,
      lignes: null
    }
  },
  methods:{
    clear(){
      this.number = ''; //On réinitialise this.number dans les data
    },
    append(num){
      if(this.operatorClicked){ // si on à cliqué sur un opérateur, on reinitialise this.number pour entrer le second chiffre
        this.number= '';
        this.operatorClicked=false
      }
      this.number = `${this.number}${num}`; //on ajoute le chiffre sélectionné à la suite de ce qui est déja entré dans this.number
    },
    remove(){
      this.number = this.number.slice(0, -1); // on enleve le dernier chiffre de this.number
    },
    setPrevNum(){
      this.prevNum = this.number;
      this.operatorClicked = true;
    },
    dot(){
      if(this.number.indexOf('.') === -1){ // si il n'y a pas de virgule dans le chiffre, en rajoute une 
        this.append('.');
      }
    },
    addition(){
      this.operator = (a, b) => a + b;
      this.setPrevNum(); // on enregistre le premier nombre du calcul
    },
    substraction(){
      this.operator = (a, b) => a - b;
      this.setPrevNum(); // on enregistre le premier nombre du calcul
    },
    multiplication(){
      this.operator = (a, b) => a * b;
      this.setPrevNum(); // on enregistre le premier nombre du calcul
    },
    division(){
      this.operator = (a, b) => a / b;
      this.setPrevNum(); // on enregistre le premier nombre du calcul
    },
    equal(){
      this.number = `${this.operator(
        parseFloat(this.prevNum), 
        parseFloat(this.number) // sans parseFloat, chiffre considéré comme string
        )}`; //on prend les deux chiffres enregistrés et on les utilise avec l'operateur cliqué
      let result = this.number;
      this.prevNum = '';

      let url = "http://localhost/backend_calculette/controller.php";

      axios.post(url,{
          result : result
        },{
          headers : {
              'Content-Type': 'text/plain',  
        }
      }) 
      .then(response => {
        console.log(response);
        //document.location.reload();
      })
      .catch(e => {
        console.log(e);
      })
      
   },
   resultat(){
     axios.get('http://localhost/backend_calculette/reception.php')
      .then(response => {
          this.lignes = response.data;
          console.log(response.data)
      })
      .catch(error => {
        console.log(error);
      });
   }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

  .affichage{
    display:flex;
    justify-content: center; 
    height: 50px;
    margin-bottom: 10px;
    align-items: center;
  }

  .lignes{
    display:flex;
    justify-content: center; 
    height: 50px;
    margin-bottom: 10px;
    align-items: center;

  }

  .lignes div{
    margin-right: 10px;
  }

  .lignes-affichage{
    width:200px;
    padding-top: 15px;
    padding-bottom: 15px;
    background-color:black;
    color:white
  }

  .lignes div{
    padding-top: 15px;
    padding-bottom: 15px;
  }

  .lignes div:hover{
    background-color: rgba(179, 174, 174, 0.2);
  }

  .calculette-ligne1 div{
    width: 100px;
  }

  .calculette-ligne2 div{
    width: 50px;
  }

  .calculette-ligne3 div{
    width: 50px;
  }

  .calculette-ligne4 div{
    width: 50px;
  }

  .calculette-ligne5 div{
    width: 50px;
  }

  button{
    margin-top: 30px;
    padding: 5px;
    background-color: black;
    color: white;
  }

  .historique-affichage{
    margin-top: 20px;
    font-size:30px;
    width: 90%;
    word-wrap: break-word;
  }
</style>
