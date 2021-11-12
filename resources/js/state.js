import { reactive } from "@vue/reactivity";

class State {
    constructor() {
        this.state = reactive({
            darkMode: false,
        });

        this.state.darkMode ? this.addDark() : this.removeDark()
    }

    setTheme(theme) {
        this.state.darkMode = theme;
    }

    removeDark() {
        document.body.classList.remove('dark')
    }

    addDark() {
        document.body.classList.add('dark')
    }

    get darkMode() {
        return this.state.darkMode;
    }

    set darkMode(value) {
        this.state.darkMode = value

        this.state.darkMode ? this.addDark() : this.removeDark()
    }
}

export const state = new State();

export const stores = {
    install: (app, options) => {
        app.config.globalProperties.$state = state;
    }
}
