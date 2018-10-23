<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function global_war_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}
/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function global_war_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Use CSS to hide titile .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // comment below line to hide current page to breadcrumb
	$breadcrumb[] = drupal_get_title();
    $output .= '<nav class="breadcrumb">' . implode(' » ', $breadcrumb) . '</nav>';
    return $output;
  }
}
/**
 * Override or insert variables into the page template.
 */
function global_war_preprocess_page(&$vars) {
  if (isset($vars['main_menu'])) {
    $vars['main_menu'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'main-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['main_menu'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'secondary-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_menu'] = FALSE;
  }
  // Add javascript files for front-page jquery slideshow.
  if (drupal_is_front_page() || theme_get_setting('slideshow_all')) {
    $directory = drupal_get_path('theme', 'global_war');
    drupal_add_js($directory . '/js/jquery.flexslider-min.js', array('group' => JS_THEME));
    drupal_add_js($directory . '/js/slide.js', array('group' => JS_THEME));
  }
  // <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' =>  'viewport',
      'content' =>  'width=device-width'
    )
  );
  drupal_add_html_head($viewport, 'viewport');
} if (isset($vars['node']->type)) {
   // If the content type's machine name is "my_machine_name" the file
   // name will be "page--my-machine-name.tpl.php".
   $vars['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
   }
/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function global_war_menu_local_tasks(&$variables) {
  $output = '';
  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}
function global_war_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}
/**
 * Override or insert variables into the node template.
 */
function global_war_preprocess_node(&$variables) {
  $node = $variables['node'];
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}
function global_war_preprocess_taxonomy_term(&$variables) {
  $variables['view_mode'] = $variables['elements']['#view_mode'];
  $variables['term'] = $variables['elements']['#term'];
  $term = $variables['term'];
  $uri = entity_uri('taxonomy_term', $term);
  $variables['term_url'] = url($uri['path'], $uri['options']);
  $variables['term_name'] = check_plain($term->name);
  $variables['page'] = $variables['view_mode'] == 'full' && taxonomy_term_is_page($term);
  // Flatten the term object's member fields.
  $variables = array_merge((array) $term, $variables);
  // Helpful $content variable for templates.
  $variables['content'] = array();
  foreach (element_children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
  // field_attach_preprocess() overwrites the $[field_name] variables with the
  // values of the field in the language that was selected for display, instead
  // of the raw values in $term->[field_name], which contain all values in all
  // languages.
  field_attach_preprocess('taxonomy_term', $term, $variables['content'], $variables);
  // Gather classes, and clean up name so there are no underscores.
  $vocabulary_name_css = str_replace('_', '-', $term->vocabulary_machine_name);
  $variables['classes_array'][] = 'vocabulary-' . $vocabulary_name_css;
  $variables['theme_hook_suggestions'][] = 'taxonomy_term__' . $term->vocabulary_machine_name;
  $variables['theme_hook_suggestions'][] = 'taxonomy_term__' . $term->tid;
}