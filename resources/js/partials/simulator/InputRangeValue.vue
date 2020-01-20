<template>
  <div class="col-xm-12 col-sm-6">
    <div class="card shadow p-1">
      <div class="card-body">
        <h1>Qual o valor do empréstimo?</h1>
        Valor: {{ val }}
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