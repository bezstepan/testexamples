<?php
namespace Page\Acceptance;

class thngs
{
    public $addNewThngButton = '.md-button[aria-label="Add new"]';
    public $filterButton = '.md-button[aria-label="Filter"]';
    public $thngElement = '.truncate:nth-child(1)';
    public $hoverElement = '.md-virtual-repeat-offsetter evt-picture.ng-isolate-scope';
    public $checkBoxElement = 'md-checkbox[aria-label]';
    public $removeThng = '.md-button[aria-label="Bulk delete"]';
    public $confirmDelete = '.md-button[ng-click="confirm()"]';

    public $nameInput = '[name="name"]';
    public $descriptionInput = 'input[placeholder="What am I?"]';
    public $tagsInput = 'input[placeholder="Enter new tag"]';
    public $identifierNameInput = '[ng-model="thng.identifiers"] input[placeholder="Name"]';
    public $identifierValueInput = '[ng-model="thng.identifiers"] input[placeholder="Value"]';
    public $submitThngButton = '.btn[type=submit]';

    public $thngValue = '//evt-object-editable//span';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    public function addNewThng ($value) {
        $I = $this->acceptanceTester; 

        $I->click($this->addNewThngButton);
        $I->wait(3);
        $I->fillField($this->nameInput, "name:$value");
        $I->fillField($this->descriptionInput, "test description:$value");
        $I->fillField($this->tagsInput, "autotests");
        $I->fillField($this->identifierNameInput, "gs1:21");
        $I->fillField($this->nameInput, $value);
        $I->click($this->submitThngButton);
        $I->waitForElement($this->thngValue, 5);
        $I->see($value);
    }

    public function deleteThng ($value) {
        $I = $this->acceptanceTester; 

        $I->moveMouseOver($this->hoverElement);
        $I->waitForElement($this->checkBoxElement, 5);
        $I->click($this->checkBoxElement);
        $I->waitForElement($this->removeThng, 5);
        $I->click($this->removeThng);
        $I->waitForElement($this->confirmDelete, 5);
        $I->click($this->confirmDelete);
        $I->wait(1);
        $I->dontSee($value);
    }
}
