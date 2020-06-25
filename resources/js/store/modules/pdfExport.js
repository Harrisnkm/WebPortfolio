

const state = () => ({
    activeForm: ''
})

const getters = {

}

const actions = {

}

const mutations = {
    changeActiveForm (state, payload){
        state.activeForm = payload.formName
    }
}




export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
