<?php
/**
 * @file
 * Returns the HTML for a single Drupal page while offline.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728174
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes; ?>><!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  <?php if ($default_mobile_metatags): ?>
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width">
  <?php endif; ?>
  <meta http-equiv="cleartype" content="on">

  <?php print $styles; ?>
  <?php print $scripts; ?>
  <?php if ($add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5-respond.js"></script>
    <![endif]-->
  <?php elseif ($add_html5_shim): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js"></script>
    <![endif]-->
  <?php endif; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>

<div id="page">

  <header id="header" role="banner">
  
<?php
/**
 * AF: adding the following to create hardcoded versions of variables stored in the Database 
 * @see https://drupal.org/node/195435  
 */
?>
  
  <?php
  $head_title = 'CB ITS ltd';
  $logo = 'sites/default/files/CBlogo-ink2-logo.png';
  // If your theme is set to display the site name, uncomment this line and replace the value:
   $site_name = 'The Drupal Sketchbook';
  // If your theme is set to *not* display the site name, uncomment this line:
  //unset($site_name);
  // If your theme is set to display the site slogan, uncomment this line and replace the value:
  $site_slogan = 'Sketching out our ideas and techniques';
  // If your theme is set to *not* display the site slogan, uncomment this line:
  // unset($site_slogan);
  // Main message. Note HTML markup.
  $content = '<p>At the moment CB ITS ltd is not available. Sorry, but we should be back soon.</p><hr />';
?>
  
  
  

    <?php if ($logo): ?>
      <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 id="site-name">
            <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php print $content; ?>


    <?php print $header; ?>

  </header>

  <div id="main">

    <div id="content" class="column" role="main">
      <?php print $highlighted; ?>
      <a id="main-content"></a>
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>


<?php
/**
 * The following line replaces the default snippet that enables error messages for anoymous users
 *
 */
?>
    <?php if (user_is_logged_in() && $show_messages && $messages): print $messages; endif; ?> 

     <?php print $content; ?>
    </div>

    <div id="navigation">
      <?php print $navigation; ?>
    </div>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>

  </div>

  <?php print $footer; ?>

</div>

<?php print $bottom; ?>

</body>
</html>
