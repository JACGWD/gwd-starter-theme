<?php

// ADD THIS TO ALL YOUR PHP FILES FOR ADDED SECURITY
if (!defined('ABSPATH'))
	exit; // EXIT IF ACCESSED DIRECTLY  


	
//  ENABLES THE SOCIAL MEDIA SHARING ICONS TO KNOW THE CURRENT PAGE URL TO SHARE
$current_page_path = get_act_url() . $_SERVER['REQUEST_URI'];
?>

<?php // This code does not pass W3C validation. Validate your pages before including this file. ?>
<ul id="share-buttons">

<!-- Facebook -->
<li class="facebook"><a href="https://www.facebook.com/sharer.php?u=<?php echo $current_page_path; ?>" target="_blank">Share on Facebook</a></li>

<!-- Twitter -->
<li class="twitter"><a href="https://twitter.com/share?url=<?php echo $current_page_path; ?>&text=<?php echo the_title(); ?>&hashtags=GWDuates2021" target="_blank">Share on Twitter</a></li>


<!-- Digg -->
<li class="digg"><a href="https://www.digg.com/submit?url=<?php echo $current_page_path; ?>" target="_blank">Share on Digg</a></li>

<!-- Reddit -->
<li class="reddit"><a href="https://reddit.com/submit?url=<?php echo $current_page_path; ?>&title=<?php echo the_title(); ?>" target="_blank">Share on Reddit</a></li>

<!-- LinkedIn -->
<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_page_path; ?>" target="_blank">Share on LinkedIn</a></li>

<!-- Pinterest -->
<li class="pinterest"><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','https://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">Share on Pinterest</a></li>


<!-- Email -->
<li class="email"><a href="mailto:?Subject=<?php echo the_title(); ?>&Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo $current_page_path; ?>">Share via Email</a></li>

</ul>
