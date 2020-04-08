<?php
namespace Page\Acceptance;

class dashboard
{
    // include url of current page
    public $thngsPage = '.md-button[aria-label="Thngs"]';
    public $productsPage = '.md-button[aria-label="Products"]';
    public $headerElement = '.evt-header';
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

    public function checkLogin($message) {
        $I = $this->acceptanceTester; 

        $I->see($message, $this->headerElement);
    }

    public function moveToThngsPage() {
        $I = $this->acceptanceTester; 

        $I->waitForElement($this->thngsPage, 5);
        $I->click($this->thngsPage);
    }
}
