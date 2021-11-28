<template>
  <div class="global">
    <h1>{{ msg }}</h1>
    <div class="calculette">

      <div class="affichage">
        <div class="lignes-affichage">Hello</div>
      </div>

      <div class="lignes calculette-ligne1">
        <div>C</div>
        <div>Del</div>
      </div>
      
      <div class="lignes calculette-ligne2">
        <div>7</div>
        <div>8</div>
        <div>9</div>
        <div>X</div>
      </div>

      <div class="lignes calculette-ligne3">
        <div>4</div>
        <div>5</div>
        <div>6</div>
        <div>-</div>
      </div>

      <div class="lignes calculette-ligne4">
        <div>1</div>
        <div>2</div>
        <div>3</div>
        <div>+</div>
      </div>

      <div class="lignes calculette-ligne5">
        <div>0</div>
        <div>.</div>
        <div>/</div>
        <div>=</div>
      </div>
      
    </div>
  </div>
</template>

<script>
export default {
  name: 'Calculette',
  props: {
    msg: String
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
</style>
