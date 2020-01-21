<template>
  <div>
    <div class="row">
      <div class="col-xl-12 col-sm-12 col-md-6">
        <h1>Qual o valor do empréstimo?</h1>
        <div>
          <h2 class="txtValue">Valor: R${{ val }},00</h2>
          <input
            type="range"
            class="slider"
            v-model="val"
            :min="inputRange.min"
            :max="inputRange.max"
            :step="inputRange.step"
            id="range"
          />
        </div>
      </div>
    </div>
    <hr />
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <h1 class>Quantas vezes?</h1>
        <div class="btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-primary btn-lg">
            3x
            <input type="radio" name="value" value="3" autocomplete="off" />
          </label>
          <label class="btn btn-primary btn-lg">
            6x
            <input type="radio" name="value" value="6" autocomplete="off" />
          </label>
          <label class="btn btn-primary btn-lg">
            12x
            <input type="radio" name="value" value="12" autocomplete="off" />
          </label>
          <label class="btn btn-primary btn-lg">
            16x
            <input type="radio" name="value" value="16" autocomplete="off" />
          </label>
          <label class="btn btn-primary btn-lg">
            24x
            <input type="radio" name="value" value="24" autocomplete="off" />
          </label>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row pt-3">
          <div class="col-6">
            <label for="otherValue">Outro prazo:</label>
            <input type="number" class="form-control inputFormat" id="otherValue" />
          </div>
          <div class="col-6">
            <label for="interestDays">Dias juros (max 20):</label>
            <input
              type="number"
              min="0"
              max="20"
              class="form-control inputFormat"
              id="interestDays"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center pt-5">
      <div class="col-6">
        <button class="btn btn-success btn-block">Simular</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      val: 1000
    };
  },
  computed: {
    inputRange() {
      return this.$store.getters.dataInputRange;
    }
  }
};
</script>

<style>
.txtValue {
  text-align: center;
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

.inputFormat {
  width: 50%;
}
</style>