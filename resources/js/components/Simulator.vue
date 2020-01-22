<template>
  <div class="container">
    <div class="card col-sm">
      <div class="card-body">
        <div>
          <InputsFromSimulator></InputsFromSimulator>
        </div>
        <hr />
        <div class="pt-2">
          <TableResult></TableResult>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import InputsFromSimulator from "../partials/simulator/InputsFromSimulator";
import Buttons from "../partials/simulator/Buttons";
import TableResult from "../partials/simulator/TableResult";

export default {
  components: { InputsFromSimulator, TableResult },
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