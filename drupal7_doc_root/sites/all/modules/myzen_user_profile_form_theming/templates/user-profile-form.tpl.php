<?php
/**
* @file
*
* This is the template file for rendering the user profile edit form.
* In this file each element of the form is rendered individually
* instead of the entire form at once, giving me the ultimate control
* over how my forms are laid out. I could also print the whole form
* at once - using the predefined layout in the module by
* printing $variables['csl_user_profile_form_theming_form'];
*
*/

// the following php snippets are required because the profile2 module is being used on this site to control user profiles
 print_r($profile_data); 

if (arg(0) == 'user' && is_numeric(arg(1))) {
  $profile = user_load(arg(1));
}
else {
  $profile = $user;
}
$profile_data = profile2_load_by_user($user->uid);
$profile_node = $profile_data['profile'];

// print '<pre>'. check_plain(print_r($profile, 1)) .'</pre>';

?>
This is the user-profile-form.tpl.php. If you can see this the template is being found in the module.

<!--The first task is to copy the layout and content of the 'header' area from the user-profile-tpl.php template. This means cut and pasting the 
code here:-->


<!--create a containing div, a header area to contain three columns which are three div's-->
<div id="container-header" style="width:960px;height:172px;">
<!--inside the "container-header" defined above, a containing div, put a div aligned to the left to the full height of the containing div-->
<!--and wide enough to contain the user's photo which has a max width of 248px-->
<div id="personphoto" style="background-color:#FFD700;height:172px;width:248px;float:left;">
<?php
//output the user's picture to the page
print render($user_profile['user_picture']);
?>
	</div>
	
	
<!--create the second div, this one will sit in the middle of the header-->
<div id="persondetails" style="background-color:#EEEEEE;height:172px;width:352px;float:left;">

<!--The client specifications require certain profile fields to be output in this div using standard styling. The HTML will consist of standard
tags that will be defined in the core of the site or in the csl theme. I am going to copy most of the segments of HTML that were used in the old
Drupal 6 site. One or two of these fields are generated using extra logic which is catered for using php snippets. I am going to just
copy these snippets along with the HTML segments. The only thing i am doing is re-arranging the order of the fields by rearranging the order of the HTML 
and PHP snippets-->
<!--I am copying the fields layout shown in a photoshop screenshot that i understand is the design required by the client-->

<!-- According to that screenshot, the first field in this div is the full name of the user in text larger than any of the other fields on the page
So it could be <h1> and the others <h2> or <h3>. This field is generated dynamically by a PHP snippet with no additional HTML text.-->


			                <span class="name">
<?php print check_plain($profile_node->field_profile_fname[0]['value']) . ' ' . check_plain($profile_node->field_profile_surname[0]['value']); ?>
                </span><br />		
				
				
				
				<!-- One line below is the position of the user, for example 'middle manager', which will be ouput by a php snippet with no HTML text-->

<!--Two lines below are six fields all with the same 'look'. Each contains a mix of HTML and a PHP snippet to provide the dynamic content.
     These are in order, from top to bottom,
	 Grade
	 Organisation
	 Location
	 Manager
	 Highest Qualifaction
	 Qualification currently undertaken-->
	 
	  <dl>
      <dt>Grade</dt>
      <dd>
        <?php
        foreach ($profile_node->taxonomy_vocabulary_2[LANGUAGE_NONE] as $term) {
          print check_plain($term['taxonomy_term']->name);
        }
        ?>
		
		<dt>Organisation</dt>
        <dd>
          <?php
          foreach ($profile_node->taxonomy_vocabulary_23[LANGUAGE_NONE] as $term) {
              print check_plain($term['taxonomy_term']->name);
          }
          ?>
        </dd>

        <dt>Location</dt>
        <dd>
          <?php
          foreach ($profile_node->taxonomy_vocabulary_9[LANGUAGE_NONE] as $term) {
              print check_plain($term['taxonomy_term']->name);
          }
          ?>
        </dd>

		        <?php
        // Get the manager relationship where I am the requestee (i.e. team member)
        if ($relationships = user_relationships_load(array('rtid' => 1, 'requestee_id' => $profile->uid))) {
          // Purposefully print all in case there is an inconsistency it will be spotted
          foreach ($relationships as $relationship) {
            $manager_user = user_load($relationship->requester_id);
			}
			}
            ?>
            <dt>Manager</dt>
            <dd><?php print check_plain($manager_user->realname); ?></dd>


         
        <?php
        foreach ($profile_node->taxonomy_vocabulary_19[LANGUAGE_NONE] as $term) {
          print check_plain($term['taxonomy_term']->name);
        }
        ?>
      </dd>
		
		
      <dt>Qualification currently undertaking</dt>
      <dd>
        <?php
        foreach ($profile_node->taxonomy_vocabulary_20[LANGUAGE_NONE] as $term) {
          print check_plain($term['taxonomy_term']->name);
        }
        ?>
      </dd>
    </dl>
		</div>
	 
	 
<!--Create the third div to sit at the right hand side of the header containing div. It is sized to full height of the header.
	This div contains a background image, a title h1 tagged, "Contact Info", then below it:
	email address displayed as a link
	telephone number-->
<div id="contactinfo" style="background-color:khaki; height:172px;width:360px;float:left;">
<h2>Contact Info</h2>

	   <dt>Email</dt>
        <dd class="softwrap"><?php print l($profile->mail, 'mailto:' . $profile->mail); ?></dd>

        <dt>Telephone</dt>
        <dd><?php print check_plain($profile_node->field_profile_telephone[LANGUAGE_NONE][0]['value']); ?></dd>

</div>
</div>

<?php
/**
* The next task is to print out the form fields.
*/
// Or you can just print out all the fields with this line:
print '<div id="csl_user_profile_form_theming">';
print $variables['csl_user_profile_form_theming_form'];
print '</div>';
// print $csl_user_profile_form_theming_form;
?>

