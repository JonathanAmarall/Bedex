import axios from "axios";

export default {
    state: {
        // calculation data
        simulatorData: {
            financedAmount: 0,     // valor financiado
            interestRate: 0.15,  // taxa de juros %
            term: 0,     // prazo
            collectionFee: 69.00, // taxa de cobrança
            registrationFee: 50.0,  // taxa de cadastro
            consultationFee: 20.0,  // taxa de consulta
            interestDays: 0,     // Dias Juros
            interestDaysValue: 0,     // dias juros valor
            installmentValueWithoutTariff: 0,     // valor da parcela sem tarifa
            totalInterest: 0,     //  total de juros
            totalPartial: 0,     // total parcial
            totalFare: 0,     // total de tarifas
            totalFinancing: 0,     //total do financiamento
            installmentValuePlusTariff: 0,     // valor das parcelas mais tarifas
        },

        inputRangeLoan: {
            step: 250,
            min: 1000,
            max: 10000,
            initVal: 0,

        },
        inputRangeTimes: {
            step: 3,
            min: 3,
            max: 12,
            initVal: 0,
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
        UPDATE_TERM_FINANCEDAMOUNT_INTERESTDAYS(state, payload) {
            state.simulatorData.term = payload.term;
            state.simulatorData.financedAmount = payload.financedAmount;
            state.simulatorData.interestDays = payload.interestDays;
        },
        UPDATE_TOTALPARTIAL(state, payload) {
            state.simulatorData.totalPartial = payload;
        },
        UPDATE_INSTALLMENT_VALUE_WITHOUT_TARIFF(state, payload) {
            state.simulatorData.installmentValueWithoutTariff = payload;
        },
        UPDATE_TOTALINTEREST(state, payload) {
            state.simulatorData.totalInterest = payload;
        },
        UPDATE_INTEREST_DAYS_VALUE(state, payload) {
            state.simulatorData.interestDaysValue = payload;
        },
        UPDATE_TOTAL_FARE(state, payload) {
            state.simulatorData.totalFare = payload;
        },
        UPDATE_INSTALLMENT_VALUE_PLUS_TARIFF(state, payload) {
            state.simulatorData.installmentValuePlusTariff = payload;
        },
        UPDATE_TOTAL_FINANCING(state, payload) {
            state.simulatorData.totalFinancing = payload;
        },
        UPDATE_INPUT_RANGE_TIMES(state, payload) {
            state.inputRangeTimes.step = payload.inputRangeTimesStep;
            state.inputRangeTimes.max = payload.inputRangeTimesMax;
            state.inputRangeTimes.min = payload.inputRangeTimesMin;
            state.inputRangeTimes.initVal = payload.inputRangeTimesVal;
        },
        UPDATE_INPUT_RANGE_LOAN(state, payload) {
            state.inputRangeLoan.step = payload.inputRangeLoanStep;
            state.inputRangeLoan.max = payload.inputRangeLoanMax;
            state.inputRangeLoan.min = payload.inputRangeLoanMin;
            state.inputRangeLoan.initVal = payload.inputRangeLoanVal;
        },
        UPDATE_SIMULATOR_DATA(state, payload){
            state.simulatorData.interestRate = payload.interestRate;
            state.simulatorData.collectionFee = payload.collectionFee;
            state.simulatorData.registrationFee = payload.registrationFee;
            state.simulatorData.consultationFee = payload.consultationFee;
        }
    },
    actions: {
        async getValueRangeTimes({ commit }) {
            await axios.get('/simulator/getValueRangeTimes').then(res => commit('UPDATE_INPUT_RANGE_TIMES', res.data));
        },
        async getValueRangeLoan({ commit }) {
            await axios.get('/simulator/getValueRangeLoan').then(res => commit('UPDATE_INPUT_RANGE_LOAN', res.data));
        },
        updateSimulatorData({ commit }) {
            axios.get('/simulator/updateSimulatorData').then(res => commit('UPDATE_SIMULATOR_DATA', res.data));
        },

        calculateFinancing({ commit, state }, payload) {
            console.log(payload)

            let financedAmount = payload.financedAmount;
            let term = parseFloat(payload.term);
            let interestRate = parseFloat(state.simulatorData.interestRate);
            let cf = interestRate / (1 - (1 / Math.pow(1 + interestRate, term)))
            let installmentValueWithoutTariff = cf * financedAmount;
            let totalPartial = (cf * financedAmount) * term;
            let totalInterest = totalPartial - financedAmount;
            let interestDaysValue = financedAmount * interestRate * payload.interestDays / 30;
            let totalFare = parseFloat(state.simulatorData.collectionFee + state.simulatorData.registrationFee + state.simulatorData.consultationFee + interestDaysValue);
            let installmentValuePlusTariff = parseFloat(installmentValueWithoutTariff + totalFare);
            let totalFinancing = installmentValuePlusTariff * term;

            commit('UPDATE_TOTAL_FINANCING', totalFinancing);
            commit('UPDATE_INSTALLMENT_VALUE_PLUS_TARIFF', installmentValuePlusTariff);
            commit('UPDATE_TOTAL_FARE', totalFare);
            commit('UPDATE_INTEREST_DAYS_VALUE', interestDaysValue);
            commit('UPDATE_TOTALINTEREST', totalInterest);
            commit('UPDATE_TERM_FINANCEDAMOUNT_INTERESTDAYS', payload);
            commit('UPDATE_TOTALPARTIAL', totalPartial);
            commit('UPDATE_INSTALLMENT_VALUE_WITHOUT_TARIFF', installmentValueWithoutTariff);
        }
    }
}