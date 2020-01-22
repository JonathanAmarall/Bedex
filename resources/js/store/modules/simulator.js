export default {
    state: {
        // calculation data
        simulatorData: {
            financedAmount: 0, // valor financiado
            interestRate: 0.15, // taxa de juros %
            term: 0, // prazo
            collectionFee: 69.00, // taxa de cobrança
            registrationFee: 50.0, // taxa de cadastro
            consultationFee: 20.0, // taxa de consulta
            interestDays: 0, // Dias Juros
            installmentValueWithoutTariff: 0, // valor da parcela sem tarifa
            totalInterest: 0, //  total de juros
            totalPartial: 0, // total parcial
            totalFare: 0, // total de tarifas
            totalFinancing: 0, //total do financiamento
            installmentValuePlusTariff: 0, // valor das parcelas mais tarifas
            coefficient: 0, // coeficiente
        },

        inputRangeLoan: {
            step: 250,
            min: 1000,
            max: 10000,
        },
        inputRangeTimes: {
            step: 3,
            min: 3,
            max: 12,
        }
    },
    getters: {
        dataInputRangeLoan(state) {
            return state.inputRangeLoan
        },
        dataInputRangeTimes(state) {
            return state.inputRangeTimes
        },
        simulatorData(state) {
            return state.simulatorData
        }

    },
    mutations: {
        calculateFinancing(state, payload) {
            let cf;
            let i = parseFloat(state.simulatorData.interestRate);
            let val = parseFloat(payload.val);
            let n = parseFloat(payload.term);
            
        //    cf = this.extractCoeficcient(i,n);
            cf = i / (1 - (1 / Math.pow(1 + i, n)))
            let result = (cf * val) * n;
            state.simulatorData.term = payload.term
            state.simulatorData.totalPartial = result;
            state.simulatorData.installmentValueWithoutTariff =  cf * val;
            state.simulatorData.totalInterest = result - payload.val;
            state.simulatorData.totalFare = state.simulatorData.collectionFee + state.simulatorData.registrationFee + state.simulatorData.consultationFee;
            // dias juros = val * juros * dias juros / 30
            console.log("Parcela s/tarifa " + cf * val)
            console.log("Coeficiente " + cf)
            console.log("Total Parcial " + result)
        }
    },
    actions: {
        extractCoeficcient(i, n) {
            let cf = i / (1 - (1 / Math.pow(1 + i, n)))
            return cf;
        }
    }


}