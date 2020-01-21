<template>
  <div class="row pt-2">
    <div class="col-sm-6">
      <table class="table table-sm">
        <tbody>
          <tr>
            <th scope="col">Valor Financiado:</th>
            <td>R${{ simulator.financedAmount.toFixed(2) }}</td>
          </tr>
          <tr>
            <th scope="col">Taxa de Juros:</th>
            <td>{{ simulator.interestRate * 100 }}%</td>
          </tr>
          <tr>
            <th scope="col">Prazo (meses):</th>
            <td>{{ simulator.term }}</td>
          </tr>
           <tr>
            <th scope="col">Tarifa de cobrança:</th>
            <td>R${{ simulator.collectionFee.toFixed(2) }}</td>
          </tr>
          <tr>
            <th scope="col">Tarifa de Cadastro:</th>
            <td>R${{ simulator.registrationFee.toFixed(2) }}</td>
          </tr>
          <tr>
            <th scope="col">Tarifa de consulta:</th>
            <td>R${{ simulator.consultationFee.toFixed(2) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div align="center" class="divider"></div>
    <div class="col-sm-5">
      <table class="table table-sm">
        <tbody>
          <tr>
            <th scope="col">Valor da Parcela (sem tarifa):</th>
            <td>R${{ simulator.installmentValueWithoutTariff }}</td>
          </tr>
          <tr>
            <th scope="col">Total de Juros:</th>
            <td>R${{ simulator.totalInterest }}</td>
          </tr>
          <tr>
            <th scope="col">Total Parcial 1:</th>
            <td>R${{ simulator.totalParcial }}</td>
          </tr>
          <tr>
            <th scope="col">Dias Juros (ajuste parcela):</th>
            <td>R${{ simulator.interesDays }}</td>
          </tr>
          <tr>
            <th scope="col">Total de Tarifas:</th>
            <td>R${{ simulator.totalFare }}</td>
          </tr>
          <tr>
            <th scope="col">Total total Financiamento:</th>
            <td>R${{ simulator.totalFinancing }}</td>
          </tr>
          <tr>
            <th scope="col">Valor das Parcelas (com tarifas):</th>
            <td>R${{ simulator.installmentValuePlusTariff }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
    };
  },
  computed:{
      simulator(){
          console.log(this.$store.state.simulator.simulatorData)
          return this.$store.state.simulator.simulatorData
      }
  }
};
</script>

<style>
.divider {
  border-left: 2px solid rgb(146, 146, 146);
  height: auto;
}
</style>