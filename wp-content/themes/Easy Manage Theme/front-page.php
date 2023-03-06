<?php get_header();?>

<?php 

$start_time = microtime(true);
 //echo do_shortcode('[wilson2 team_members = "Kim, Chrispin" number_of_trainees = "2"]');
 //echo do_shortcode('[wilson title="New Title" description="fill me up"] ');
 echo do_shortcode('[externalApi]');

$end_time = microtime(true);

$run_time = ($end_time - $start_time);

//echo "<p>It took: <strong>".$run_time."</strong> to run this script.</p>";

?>



<?php get_footer();?>