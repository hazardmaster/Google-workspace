<?php
require_once dirname(__FILE__).'/GoogleWorkspace.php';

$google = new GoogleWorkspace();

try {
    // initiate access token setting
    $google->setAccessToken();
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    if($errorMessage == "generate code first"){
        $authUrl = $google->getAuthUrl();
        echo "Generate code using the url below and add to params as shown below. Then run the request once more:<br>";
        echo "i.e., ?code=entercodehere <br>";
        echo "<a href='$authUrl'>Generate Code</a>";
    }else{
        echo $errorMessage;
    }
}

// check for get request
$getRequests = $_GET;
if($getRequest){
    foreach($requests as $key => $value){
        switch ($key) {
            case 'getAllUsers':
                $google->listWorkspaceUsers();
                break;
            default:
                break;
        }
    }
}else{
    echo "no request received";
    exit;
}