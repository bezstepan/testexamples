import { Selector, t } from 'testcafe'

class Login { 
    constructor() {
        this.loginInput = Selector('#input_0');
        this.passwordInput = Selector('#input_1');
        this.submitButton = Selector('.md-button[type="submit"]');
    }

    async login (loginValue, passwordValue) {
        await t
            .typeText(this.loginInput, loginValue)
            .typeText(this.passwordInput, passwordValue)
            .click(this.submitButton);
    }

}

export default new Login();