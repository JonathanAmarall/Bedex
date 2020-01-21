<template>
  <div>
    <div>
      <h1>Quantas vezes?</h1>
    </div>
    <div class="center col-sm pt-2">
      <button type="button" class="btn btn-primary">3x</button>
      <button type="button" class="btn btn-primary">6x</button>
      <button type="button" class="btn btn-primary">12x</button>
      <button type="button" class="btn btn-primary">16x</button>
      <button type="button" class="btn btn-primary">24x</button>
    </div>
    <div class="center pt-2 col-xl-12 col-md-6">
      Outro:
      <input type="number" class="inputOtherValue" /> x
    </div>
  </div>
</template>

<script>
export default {};
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