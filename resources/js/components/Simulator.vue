<template>
  <div class="container">
    <div class="card col-sm">
      <div class="card-body">
        <div>
          <InputsFromSimulator></InputsFromSimulator>
        </div>
        <loading :active.sync="isLoading" 
        :is-full-page="fullPage"></loading>
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
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
  components: { InputsFromSimulator, ModalTableResult, Loading },
  data() {
    return {
      isLoading: true,
      fullPage: true
    };
  },
  created(){
    setInterval( () => {
      this.isLoading = false;
    },1500);
  },
 
};
</script>

<style>
</style>