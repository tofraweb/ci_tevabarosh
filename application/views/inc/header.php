<!DOCTYPE html>
<html lang="en">
<?php error_reporting(E_ALL ^ E_WARNING); ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>טופרבוט תבנית בוסטרפ</title>

    <!-- Bootstrap Core CSS-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap_rtl.css" type="text/css">

    <!-- Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/modern-business.css" type="text/css">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">ניוט טוגל</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">טופרבוט - תבנית</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">פורטפוליו <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/portfolio_1_col/100">פורטפוליו - עמוד 1</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/portfolio_2_col/20">פורטפוליו 2 עמודים</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/portfolio_3_col/9">פורטפוליו 3 עמודים</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/portfolio_4_col/12">פרוטפוליו 4 עמודים</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">בלוג <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/blog_home_1">בלוג בית 1</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/blog_home_2">בלוג בית 2</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/blog_post">בלוג - פוסט</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">עמודים מיוחדים <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/fullwidth">רוחב מלא</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/sidebar">סיידבר</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/faq">שאלות ותשובות</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/page_404">404</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/page/get_name/pricing">טבלאות תמחור</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">בסיס נתונים<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url();?>index.php/upload">הוסף ציפור</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/catalog/?cat=2">ציפורים</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/catalog/?cat=3">צמחי גינה</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/catalog/?cat=4">סוקולנטים</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/catalog/?cat=1">פרחי שדה</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/page/get_name/about">מי אנחנו</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/page/get_name/services">שרותים</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/page/get_name/contact">צור קשר</a>
                    </li>
                    <li>
                      <div style="margin-top: 15px;margin-right: 15px; ">
                        <form method="get" action="<?php echo base_url();?>index.php/catalog">
                          <input type="text" name="s" id="s" />
                          <input type="submit" value="חפש" />
                        </form>
                      </div>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
