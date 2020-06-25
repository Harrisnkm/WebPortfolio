import Vue from 'vue'
import Vuex from 'vuex'
import pdfExport from './modules/pdfExport'

Vue.use(Vuex)


export default new Vuex.Store({
    modules: {
        pdfExport
    }
})
