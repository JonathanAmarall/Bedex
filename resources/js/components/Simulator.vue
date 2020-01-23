<template>
  <div class="container">
    <div class="card col-sm">
      <div class="card-body">
        <div>
          <InputsFromSimulator></InputsFromSimulator>
        </div>
        <hr />
        <div class="pt-2">
          <ModalTableResult></ModalTableResult>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import InputsFromSimulator from "../partials/simulator/InputsFromSimulator";
import ModalTableResult from "../partials/simulator/ModalTableResult";

export default {
  components: { InputsFromSimulator, ModalTableResult },
  data() {
    return {};
  },
 
  methods: {
    enviarDados() {}
  }
};
</script>

<style>
</style>