## Setup

#### requirements

The setup guide is for macos only

* php
* codeception
* chrome driver
* selenium standalone

#### installation

```
$brew install php
$brew install wget 
$wget https://codeception.com/codecept.phar
$chmod +x codecept.phar
$mv codecept.phar /usr/local/bin/codecept
$brew cask install chromedriver
$brew install selenium-server-standalone
```

## Usage

1. Register at dashboard.evrythng.com
2. Update codeception.yml with your credentials
3. run 

```
$codecept run --env prod
```