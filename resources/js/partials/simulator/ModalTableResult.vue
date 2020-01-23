<template>
  <div
    class="modal fade bd-example-modal-lg"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title">Resultado da simulação</div>
        </div>
        <div class="row pt-2">
          <div class="col-sm-6">
            <table class="table table-sm">
              <tbody>
                <tr>
                  <th scope="col">Valor Financiado:</th>
                  <td>R${{ simulator.financedAmount }}</td>
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
                  <td>R${{ simulator.collectionFee }}</td>
                </tr>
                <tr>
                  <th scope="col">Tarifa de Cadastro:</th>
                  <td>R${{ simulator.registrationFee }}</td>
                </tr>
                <tr>
                  <th scope="col">Tarifa de consulta:</th>
                  <td>R${{ simulator.consultationFee }}</td>
                </tr>
                <tr>
                  <th scope="col">Dias Juros (solicitado):</th>
                  <td>{{ simulator.interestDays }}</td>
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
                  <td>R${{ simulator.installmentValueWithoutTariff.toFixed(2) }}</td>
                </tr>
                <tr>
                  <th scope="col">Total de Juros:</th>
                  <td>R${{ simulator.totalInterest.toFixed(2) }}</td>
                </tr>
                <tr>
                  <th scope="col">Total Parcial 1:</th>
                  <td>R${{ simulator.totalPartial.toFixed(2) }}</td>
                </tr>
                <tr>
                  <th scope="col">Dias Juros (ajuste parcela):</th>
                  <td>R${{ simulator.interestDaysValue.toFixed(2) }}</td>
                </tr>
                <tr>
                  <th scope="col">Total de Tarifas:</th>
                  <td>R${{ simulator.totalFare.toFixed(2)  }}</td>
                </tr>
                <tr>
                  <th scope="col">Valor total Financiamento:</th>
                  <td>R${{ simulator.totalFinancing.toFixed(2) }}</td>
                </tr>
                <tr>
                  <th scope="col">Valor das Parcelas (com tarifas):</th>
                  <td>R${{ simulator.installmentValuePlusTariff.toFixed(2) }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  computed: {
    simulator() {
      console.log(this.$store.state.simulator.simulatorData);
      return this.$store.getters.simulatorData;
    }
  },
  created() {
    this.$store.dispatch("updateSimulatorData");
  }
};
</script>

<style>
.divider {
  border-left: 2px solid rgb(146, 146, 146);
  height: auto;
}
</style>