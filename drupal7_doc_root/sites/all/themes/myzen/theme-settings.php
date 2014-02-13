<?php
/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function myzen_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL)  {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  // Create the form using Forms API: http://api.drupal.org/api/7

  /* -- Delete this line if you want to use this setting
  $form['myzen_example'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('STARTERKIT sample setting'),
    '#default_value' => theme_get_setting('myzen_example'),
    '#description'   => t("This option doesn't do anything; it's just an example."),
  );
  // */

  // Remove some of the base theme's settings.
  unset($form['themedev']['zen_layout']); // We don't need to select the layout stylesheet.
  
  $form['feed'] = array(
  '#type' => 'fieldset',
  '#title' => t('Feed settings')
  );
  $form['feed']['zen_display_feed_icons'] = array(
  '#type' => 'checkbox',
  '#title' => t('Display feed icons in the body of the page.'),
  '#default_value' => theme_get_setting('zen_display_feed_icons')
  );


  
  // We are editing the $form in place, so we don't need to return anything.
}
