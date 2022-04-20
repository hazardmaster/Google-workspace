<?php
require_once dirname(__FILE__).'/vendor/autoload.php';

class GoogleWorkspace {
    public $tokenPath = 'token.json';
    public $authCode;

    public function __construct() {
        $this->client = new Google_Client();
        $this->client->setApplicationName("Google Workspace");

        // add scope for admin user
        $this->client->addScope(Google_Service_Directory::ADMIN_DIRECTORY_USER);
        $this->client->addScope(Google_Service_Directory::ADMIN_DIRECTORY_GROUP);
        $this->client->addScope(Google_Service_Directory::ADMIN_DIRECTORY_GROUP_MEMBER);
        $this->client->addScope(Google_Service_Calendar::CALENDAR);
        $this->client->setAuthConfig(dirname(__FILE__).'/../config/client_secret_120213978309-97la4l7jbci7hgre8hn9g8tmiuff5081.apps.googleusercontent.com.json');
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');    
        $this->authCode = $_GET['code']??null;
    }
}





