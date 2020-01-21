<template>
  <div>
    <div>
      <h1>Quantas vezes?</h1>
    </div>
    <div class="center col-sm pt-2">
      <button type="button" value="3" class="btn btn-primary">3x</button>
      <button type="button" value="6" class="btn btn-primary">6x</button>
      <button type="button" value="12" class="btn btn-primary">12x</button>
      <button type="button" value="16" class="btn btn-primary">16x</button>
      <button type="button" value="24" class="btn btn-primary">24x</button>
    </div>
    <div class="center pt-2 col-xl-12 col-md-6">
      <label for="inputOtherValue">Outro:</label>
      <input type="number" id="inputOtherValue" class="inputOtherValue form-control" /> x
    </div>
  </div>
</template>

<script>
export default {
  
};
</script>

<style>
.inputOtherValue {
  width: 50%;
  text-align: center;
}
.center {
  text-align: center;
}
</style>