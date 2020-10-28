<?php
    //https://api.imgur.com/oauth2/addclient

    define("CLIENT_ID", "CLIENT_ID");
    define("CLIENT_SECRECT", "CLIENT_SECRECT");
    define("CLIENT_REPONSE_TYPE", "code");
    define("CLIENT_GRANT_TYPE", "authorization_code");

    define("URL_AUTHORIZE", "https://api.imgur.com/oauth2/authorize?client_id=" . CLIENT_ID . "&response_type=" .CLIENT_REPONSE_TYPE);
    define("URL_TOKEN", "https://api.imgur.com/oauth2/token");

    define("URL_IMGUR", "https://api.imgur.com/3/");


