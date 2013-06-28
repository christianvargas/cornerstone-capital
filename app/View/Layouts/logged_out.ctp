<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Sustainable Banking
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- bootstrap -->
    <link href="/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/css/elements.css">
    <link rel="stylesheet" type="text/css" href="/css/icons.css">
    <link rel="stylesheet" type="text/css" href="/css/compiled/signup.css">
    <link rel="stylesheet" type="text/css" href="/css/esg-styles.css">


    <!-- this page specific styles 
    <link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" />    
    -->

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

    <div class="navbar navbar-inverse" style="margin-bottom: 75px;">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="/projects.php" style="float:none; text-align:center;" >
                Sustainable Banking
            </a>        
        </div>
    </div>

    <?php if( $error = $this->Session->flash('auth') ): ?>
        <div class="row-fluid">
            <div class="alert alert-error span6 offset3">
                <i class="icon-remove-sign"></i>
                <?= $error; ?>
            </div>
        </div>
    <?php endif; ?>
    <?= $this->fetch('content'); ?>

    <!-- scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/theme.js"></script>

    <script>
        $(function () {
            $('input:first').focus();            
        })
    </script>    
</body>
</html>






