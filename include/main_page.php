<?php

/* Get radio info */

if ($_GET['getradio'])
{
    echo get_current_radio_status();
    die();
}

// NEED TO CLEANUP

include_once('twitteroauth/twitteroauth.php');

$twitter_customer_key           = get_config('twitterkey');
$twitter_customer_secret        = get_config('twittersecret');
$twitter_access_token           = get_config('twittertoken');
$twitter_access_token_secret    = get_config('twittertokensecret');

if (!empty($twitter_customer_key)) {

    $connection = new TwitterOAuth($twitter_customer_key, $twitter_customer_secret, $twitter_access_token, $twitter_access_token_secret);

    $my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => get_config('twitter1'), 'count' => 5));

    if(isset($my_tweets->errors))
    {           
        echo 'Error :'. $my_tweets->errors[0]->code. ' - '. $my_tweets->errors[0]->message;
    }else{
        $tpl_twitter_content = "";
        $i = 0;
        foreach ($my_tweets as $tweet) {
            $ac = ($i == 0) ? "active" : "";

            $tpl_twitter_content .= $HTMLOutput->GetFileContent('twitter_element.tpl', array("TEXT" => makeClickableLinks($tweet->text), "ACTIVE" => $ac, "DATE" => time_elapsed_string($tweet->created_at), "USER" => "Radixu Irratia"));
            $i++;
        }
    }

    $my_tweets = $connection->get('statuses/user_timeline', array('screen_name' => get_config('twitter2'), 'count' => 5));

    if(isset($my_tweets->errors))
    {           
        echo 'Error :'. $my_tweets->errors[0]->code. ' - '. $my_tweets->errors[0]->message;
    }else{
        $tpl_twitter_content2 = "";
        $i = 0;
        foreach ($my_tweets as $tweet) {
    //    	echo makeClickableLinks($my_tweets[0]->text);
            $ac = ($i == 0) ? "active" : "";
            //var_dump($tweet);
            $tpl_twitter_content2 .= $HTMLOutput->GetFileContent('twitter_element.tpl', array("TEXT" => makeClickableLinks($tweet->text), "ACTIVE" => $ac, "DATE" => time_elapsed_string($tweet->created_at), "USER" => "Arrosa Sarea"));
            $i++;
        }
    }
} else {
    $tpl_twitter_content = "";
    $tpl_twitter_content2 = "";
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'urte',
        'm' => 'hilabete',
        'w' => 'aste',
        'd' => 'egun',
        'h' => 'ordu',
        'i' => 'minutu',
        's' => 'segundu',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);

    return $string ? 'orain dela ' . implode(', ', $string)  : 'oraintxe';
}

//function to convert text url into links.
function makeClickableLinks($s) {
  return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a target="blank" rel="nofollow" href="$1" target="_blank">$1</a>', $s);
}

// load notes

$notes = $db->get_results("SELECT * FROM notes ORDER BY date DESC");

$tpl_notes = "";
$i = 0;
foreach ($notes as $note)
{
	$ac = ($i == 0) ? "active" : "";
	$tpl_notes .= $HTMLOutput->GetFileContent('note_element.tpl', array("TEXT" => makeClickableLinks($note->text), "TITLE" => $note->title, "ACTIVE" => $ac));
	$i++;
}


$uploaded_podcasts = $db->get_var("SELECT COUNT(*) FROM podcast_upload WHERE uploaded=1");
$active_shows = $db->get_var("SELECT COUNT(*) FROM programs WHERE enabled=1");
$live_streams = $db->get_var("SELECT COUNT(*) FROM programs WHERE live_allowed=1");
$external_podcasts = $db->get_var("SELECT COUNT(*) FROM podcast_download");


$emak = $db->get_results("SELECT podcast_upload.*, users.name as irratsaioa FROM podcast_upload INNER JOIN users ON users.id=podcast_upload.userid WHERE is_trash='0' ORDER BY uploaded, date DESC");

$taula = "";
foreach ($emak as $elem)
{
	$status_color = ($elem->uploaded) ? "success" : "warning";
	$status_text = ($elem->uploaded) ? "Igota" : "Ilaran";

	$date_upload = ($elem->uploaded) ? $elem->uploaded_date : "";

	$taula .= $HTMLOutput->GetFileContent('mainpage_table_elements.tpl', array("NAME" => $elem->irratsaioa, "DATE" => $elem->date, "TITLE" => $elem->title, "STATUS" => $status_color, "STATUS_TEXT" => $status_text, "DATEUP" => $date_upload));
}

$emak = $db->get_results("SELECT * FROM podcast_upload WHERE userid='".$current_user->login_realid."' AND is_trash='0' ORDER BY date DESC");

$taula2 = "";
foreach ($emak as $elem)
{
	$status_color = ($elem->uploaded) ? "success" : "warning";
	$status_text = ($elem->uploaded) ? "Igota" : "Ilaran";
	$nora = "";
	$nora .= ($elem->add_repeat) ? "Errepikapenak" : "";
	$nora .= ($elem->add_podcast) ? ", Podcastak" : "";
	$nora .= ($elem->add_arrosa) ? ", Arrosa" : "";
	$nora .= ($elem->add_copy) ? ", Karpeta" : "";
	$date_upload = ($elem->uploaded) ? $elem->uploaded_date : "";

	$taula2 .= $HTMLOutput->GetFileContent('mainpage_table_elements.tpl', array("NAME" => $nora, "DATE" => $elem->date, "TITLE" => $elem->title, "STATUS" => $status_color, "STATUS_TEXT" => $status_text, "DATEUP" => $date_upload));
}




$tpl_content = $HTMLOutput->GetFileContent('content.tpl', array("TWEETS" => $tpl_twitter_content,"TWEETS2" => $tpl_twitter_content2, "NOTES" => $tpl_notes, "UPLOADED_PODCASTS" => $uploaded_podcasts, "ACTIVE_SHOWS" => $active_shows, "LIVE_STREAMS" => $live_streams, "EXTERNAL_PODCASTS" => $external_podcasts, "TABLE_ELEMENTS" => $taula, "TABLE_ELEMENTS2" => $taula2));
		