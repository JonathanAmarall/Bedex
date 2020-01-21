export default {
    state: {
        // calculation data
        simulatorData: {
            financedAmount: 0, // valor financiado
            interestRate: 0.15, // taxa de juros %
            term: 10, // prazo
            collectionFee: 69.01, // taxa de cobrança
            registrationFee: 50.0, // taxa de cadastro
            consultationFee: 20.0, // taxa de consulta
            interestDays: 0, // Dias Juros
            installmentValueWithoutTariff: 0, // valor da parcela sem tarifa
            totalInterest: 0, //  total de juros
            totalPartial: 0, // total parcial
            totalFare: 0, // total de tarifas
            totalFinancing: 0, //total do financiamento
            installmentValuePlusTariff: 0, // valor das parcelas mais tarifas
            coefficient: 19.92, // coeficiente
        },

        inputRange: {
            step: 250,
            min: 1000,
            max: 3000,
        }
    },
    getters: {
        dataInputRange(state) {
            return state.inputRange
        },
        simulatorData(state) {
            return state.simulatorData
        }

    },
    mutations: {
        calculateFinancing(state, payload) {
            state.coefficient = (payload.financedAmount / payload.term) * payload.coefficient
        }
    },
    actions: {

    }


}