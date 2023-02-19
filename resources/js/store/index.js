import { createStore } from "vuex";

const store = createStore({

    state : {
        //define variables
        token : localStorage.getItem('token') || 0,
        name : localStorage.getItem('name') || null
    },

    mutations : {
        UPDATE_TOKEN(state, payload){
            state.token = payload
        },
        UPDATE_NAME(state, payload){
            state.name = payload
        }
    },

    actions : {
        setToken(context, payload){
            context.commit('UPDATE_TOKEN', payload)
            localStorage.setItem('token', payload);
        },
        setName(context, payload){
            context.commit('UPDATE_NAME', payload)
            localStorage.setItem('name', payload);
        },
        removeUser(context){
            localStorage.removeItem('name')
            localStorage.removeItem('token')

            context.commit('UPDATE_TOKEN', 0)
            context.commit('UPDATE_NAME', null)
        }
        
    },

    getters : {
        getToken: function(state){
            return state.token;
        },

        getUsername: function(state){
            return state.name;
        }
    }
});

export default store;