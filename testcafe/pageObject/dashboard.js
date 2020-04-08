import { Selector, t } from 'testcafe'

class Dashboard { 
    constructor() {
        this.thngsPage = Selector('.md-button[aria-label="Thngs"]');
        this.productsPage = Selector('.md-button[aria-label="Products"]');
        this.headerElement = Selector('.evt-header');
    }

    async moveToThngsPage () {
        await t.click(this.thngsPage);
    }

    async moveToProductsPage () { 
        await t.click(this.productsPage);
    }

    async checkLogin (message) { 
        await t.expect(this.headerElement).eql(message);
    }

}

export default new Dashboard();