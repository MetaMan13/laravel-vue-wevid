import { reactive } from "@vue/reactivity";

class State{
    constructor() {
        this.state = reactive({
            darkMode : false,
        });
    }
    
    setTheme(theme) {
        this.state.darkMode = theme; 
    }
    
    get darkMode(){
        return this.state.darkMode;
    }

    set darkMode(value){
        this.state.darkMode = value

        if(this.state.darkMode){
            document.body.classList.add('dark')
            return
        }
        
        document.body.classList.remove('dark')
    }
}

export const state = new State();

export const stores = {
    install : (app, options) => {
        app.config.globalProperties.$state = state;
    }
}
