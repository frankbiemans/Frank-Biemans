<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

setcookie( 'nsc_cookies_accepted', '1', time() + (10 * 365 * 24 * 60 * 60), '/' );