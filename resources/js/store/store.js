import Vue from 'vue';
import Vuex from 'vuex';
import notifications from './modules/notifications'
import simulator from './modules/simulator'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        notifications,
        simulator
    }
})