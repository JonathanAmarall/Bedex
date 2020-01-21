<template>
    <div class="">
      <div class="">
        <h1>Qual o valor do empréstimo?</h1>
      </div>
      <div class="">
        <h2 class="txtValue">Valor: R${{ val }},00</h2>
        <input
          type="range"
          class="slider"
          v-model="val"
          :min="valMin"
          :max="valMax"
          :step="stepVal"
          id="range"
        />
      </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      val: 1000,
      valMin: 1000,
      valMax: 5000,
      stepVal: 250
    };
  }
};
</script>

<style>
.txtValue {
  text-align: center
}
.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: 0.2s;
  transition: opacity 0.2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4caf50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4caf50;
  cursor: pointer;
}
</style>