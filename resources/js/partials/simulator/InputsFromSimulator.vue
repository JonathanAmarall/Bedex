<template>
  <div class="col-sm">
    <div class="row">
      <div class="col-sm">
        <h1 class="txtValue">Qual o valor do empréstimo?</h1>
        <div>
          <h2 class="txtValue pt-3">Valor: R${{ dataInputRangeLoan.initVal }},00</h2>
          <input
            type="range"
            class="slider"
            v-model="dataInputRangeLoan.initVal"
            :min="dataInputRangeLoan.min"
            :max="dataInputRangeLoan.max"
            :step="dataInputRangeLoan.step"
            id="range1"
          />
        </div>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col-sm-12">
        <h1 class="txtValue">Quantas vezes?</h1>

        <div>
          <h2 class="txtValue pt-3">{{ dataInputRangeTimes.initVal }}X</h2>
          <input
            type="range"
            class="slider"
            v-model="dataInputRangeTimes.initVal"
            :step="dataInputRangeTimes.step"
            :min="dataInputRangeTimes.min"
            :max="dataInputRangeTimes.max"
            id="range2"
          />
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <label for="interestDays">Dias juros:</label>
        <input
          type="number"
          v-model="data.interestDays"
          min="0"
          max="20"
          class="form-control inputFormat"
          id="interestDays"
        />
      </div>
    </div>

    <div class="row justify-content-center pt-5">
      <div class="col-6">
        <button
          @click.prevent="calculateFinancing(data)"
          data-toggle="modal"
          data-target=".bd-example-modal-lg"
          class="btn btn-success btn-block"
        >Simular</button>
      </div>
    </div>
  </div>
</template>

<script>
import vuex from "vuex";
export default {
  data() {
    return {
      data: {
        financedAmount: 1000,
        term: 3,
        interestDays: 0
      }
    };
  },
  computed: {
    dataInputRangeLoan() {
      return this.$store.getters.dataInputRangeLoan;
    },
    dataInputRangeTimes() {
      return this.$store.getters.dataInputRangeTimes;
    }
  },
  async mounted() {
   await this.$store.dispatch("getValueRangeTimes");
   await this.$store.dispatch("getValueRangeLoan");
  },
  methods: {
    calculateFinancing(data) {
      this.$store.dispatch("calculateFinancing", data);
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

.radioButton {
  visibility: hidden;
}
.bgColorButton {
  background-color: rgb(50, 50, 218);
}
</style>