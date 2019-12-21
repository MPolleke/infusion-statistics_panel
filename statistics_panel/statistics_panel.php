<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright � 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: statistics.php
| Author: Jeroen / Polleke (SF)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if ( ! defined("IN_FUSION")) { die("Access Denied"); }


//$result = dbquery("SELECT u.user_name AS username, u.user_id AS userid, u.user_posts AS posts FROM ".DB_USERS." u ORDER BY posts DESC LIMIT 0,1");
//$mostactive = dbarray($result);

openside('Statistieken');

echo THEME_BULLET . ' Actieve Leden: ' . dbcount("(user_id)", DB_USERS, "user_status ='0'") . '<br />' . "\n";

$month_ago = strtotime( '-1 month', time() );
echo THEME_BULLET . ' Actief deze maand: ' . dbcount("(user_id)", DB_USERS, "user_lastvisit > '" . $month_ago . "'") . '<br />' . "\n";

echo THEME_BULLET . ' Gebande Leden: ' . dbcount("(user_id)", DB_USERS, "user_status ='1'") . '<br />' . "\n";
echo THEME_BULLET . ' Gedeactiveerde leden: ' . dbcount("(user_id)", DB_USERS, "user_status ='7'") . '<br />' . "\n";
//echo THEME_BULLET . ' Meest actief: ' . $mostactive['username'] . " (" . $mostactive['posts'] . ")" . '<br />' . "\n";
echo THEME_BULLET . ' Reacties: ' . dbcount("(comment_id)", DB_COMMENTS) . '<br />' . "\n";
echo THEME_BULLET . ' Shouts: ' . dbcount("(shout_id)", DB_SHOUTBOX) . '<br />' . "\n";
echo THEME_BULLET . ' Topics: ' . dbcount("(thread_id)", DB_FORUM_THREADS) . '<br />' . "\n";
echo THEME_BULLET . ' Berichten: ' . dbcount("(post_id)", DB_FORUM_POSTS) . '<br />' . "\n";
echo THEME_BULLET . ' Foto&apos;s: ' . dbcount("(photo_id)", DB_PHOTOS) . '<br />' . "\n";

closeside();
