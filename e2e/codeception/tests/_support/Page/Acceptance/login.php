<?php
namespace Page\Acceptance;

class login
{
    public static $URL = 'login';
    public $loginInput = '#input_0';
    public $passwordInput = '#input_1';
    public $submitButton = '.md-button[type="submit"]';

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

    public function login($name, $password) {
        $I = $this->acceptanceTester; 

        $I->amOnPage(self::$URL);
        $I->waitForElement($this->loginInput, 5);
        $I->fillField($this->loginInput, $name);
        $I->fillField($this->passwordInput, $password);
        $I->click($this->submitButton);
    }

}
