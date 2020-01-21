<template>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <InputRangeValue></InputRangeValue>
          </div>
          <div class="col-sm-6">
            <buttons></buttons>
          </div>
        </div>
        <hr />
        <div class="row justify-content-center">
            <div class="col-sm-6">
              <button class="btn btn-success btn-block">Simular</button>
            </div>
        </div>
        <div class="pt-2">
          <TableResult></TableResult>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import InputRangeValue from "../partials/simulator/InputRangeValue";
import Buttons from "../partials/simulator/Buttons";
import TableResult from "../partials/simulator/TableResult"

export default {
  components: { InputRangeValue, Buttons,TableResult },
  data() {
    return {};
  }
};
</script>

<style>
</style>