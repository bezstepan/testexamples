<?php
class ThngsCest 
{   
    public $thng;
    public function _before(AcceptanceTester $I, \Page\Acceptance\login $loginPage)
    {
        $I->resizeWindow(1920,1080);
        $loginPage->login($I->getConfig('username'), $I->getConfig('password'));
    }

    public function createThng(AcceptanceTester $I, \Page\Acceptance\dashboard $dashboard, \Page\Acceptance\thngs $thngs)
    {
        $this->thng = $I->generateThng(15);
        $dashboard->moveToThngsPage();
        $thngs->addNewThng($this->thng);
    }
    
    public function deleteThng(AcceptanceTester $I, \Page\Acceptance\dashboard $dashboard, \Page\Acceptance\thngs $thngs)
    {
        $dashboard->moveToThngsPage();
        $thngs->deleteThng($this->thng);
    }       
}