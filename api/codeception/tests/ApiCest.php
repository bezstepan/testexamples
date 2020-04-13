<?php
class ApiCest 
{    
    public $projectID;
    public $factory;
    public $thngID;

    public function _before(ApiTester $I) {
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('content-type', 'application/json');
        self::setup($I);
    }

    public function generateThng(ApiTester $I) {
        $I->haveHttpHeader('Authorization', $I->getConfig("operatorApiKey"));
        $thng = $I->generateThng(15);
        $I->sendPOST("thngs?withScopes=true&project=$this->projectID", [
            "identifiers" => ["gs1:21" => $thng], 
            "customFields" => [
                "test" => "purposes",
                "factory" => "$this->factory"
            ], 
            "tags" => [
                "$this->factory",
                "action:encodings"
            ],
            "name" => "testThng: ".$thng
        ]);
        $I->seeResponseCodeIs(201);
        list($id) = $I->grabDataFromResponseByJsonPath('$.id');
        $this->thngID = $id;
    }

    public function encodeThng(ApiTester $I) {
        $I->haveHttpHeader('Authorization', $I->getConfig("trustedApiKey"));
        $I->sendPOST("thngs/$this->thngID/actions/encodings", [
            "type" => "encodings", 
            "location" => [
                            "position" => [
                                "type" => "Point",
                                "coordinates" => [13.4105300,52.5243700]
                            ]
                        ], 
            "locationSource" => "geoIp",
            "tags" => ["mobileTest", "encodings"]
        ]);
        $I->seeResponseCodeIs(201);
    }

    public function createProduct(ApiTester $I) {
        $product = $I->generateProduct(10);
        $I->haveHttpHeader('Authorization', $I->getConfig("operatorApiKey"));
        $I->sendPOST("products?withScopes=true&project=$this->projectID", [
            "identifiers" => ["gs1:01" => $product],
            "customFields" => [
                "test" => "purposes"
            ],
            "name" => "test: $product"
        ]);
        $I->seeResponseCodeIs(201);
    }

    private function setup(ApiTester $I){
        $this->projectID = $I->getConfig("projectID");
        $this->factory = $I->getConfig("factory");
    }
}