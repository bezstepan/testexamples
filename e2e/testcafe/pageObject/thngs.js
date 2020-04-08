import { Selector, t } from 'testcafe'

class Thngs { 
    constructor() {
        this.addNewThngButton = Selector('.md-button[aria-label="Add new"]');
        this.filterButton = Selector('.md-button[aria-label="Filter"]');
        this.thngElement = Selector('.truncate:nth-child(1)');
        this.hoverElement = Selector('.md-virtual-repeat-offsetter evt-picture.ng-isolate-scope');
        this.checkBoxElement = Selector('md-checkbox[aria-label]');
        this.removeThng = Selector('.md-button[aria-label="Bulk delete"]');
        this.confirmDelete = Selector('.md-button[ng-click="confirm()"]');

        this.nameInput = Selector('[name="name"]');
        this.descriptionInput = Selector('input[placeholder="What am I?"]');
        this.tagsInput = Selector('input[placeholder="Enter new tag"]');
        this.identifierNameInput = Selector('[ng-model="thng.identifiers"] input[placeholder="Name"]');
        this.identifierValueInput = Selector('[ng-model="thng.identifiers"] input[placeholder="Value"]');
        this.submitThngButton = Selector('.btn[type=submit]');

        this.thngValue = Selector('//evt-object-editable//span');
    }

    async addNewThng (value) {
        await t
            .click(this.addNewThngButton)
            .typeText(this.nameInput, `name:${value}`)
            .typeText(this.descriptionInput, `test description:${value}`)
            .typeText(this.tagsInput, 'autotests')
            .typeText(this.identifierNameInput, 'gs1:21')
            .typeText(this.identifierValueInput, value)
            .click(this.submitThngButton)
            .expect(this.thngValue.withExactText(value)).ok();
    }

    async deleteThng () {
        await t
            .hover(this.hoverElement)
            .click(this.checkBoxElement)
            .click(this.removeThng)
            .click(this.confirmDelete)
            .expect(this.thngElement.exists).notOk();
    }
}

export default new Thngs();