-- RadioCloud datubasea

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `radiocloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_user` int(100) NOT NULL,
  `access_module` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`access_user`, `access_module`) VALUES
(-1, 2),
(-1, 3),
(-1, 6),
(1, 1),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(34, 1),
(34, 5);

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE `access_menu` (
  `userid` int(100) NOT NULL,
  `menuid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`userid`, `menuid`) VALUES
(-1, 6),
(-1, 7),
(-1, 12),
(-1, 14),
(0, 0),
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 1),
(2, 2),
(2, 4),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(34, 1),
(34, 2),
(34, 4);

-- --------------------------------------------------------

--
-- Table structure for table `active_repeats`
--

CREATE TABLE `active_repeats` (
  `progid` int(200) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `remove` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `audio_library`
--

CREATE TABLE `audio_library` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `directory` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `protocol` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `vars` varchar(100) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `groupid` int(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `duration` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `type`, `vars`, `desc`, `groupid`, `enabled`, `duration`) VALUES
(1, 'Live', 'File', 'http://zuzenean.radixu.info:8000/radixu-live-128', 'Live stream', 1, 1, ''),
(2, 'IntervalSignal', 'Random', 'defektuzkoa', 'Defektuzkoa', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `block_groups`
--

CREATE TABLE `block_groups` (
  `id` int(100) NOT NULL,
  `groupname` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `block_groups`
--

INSERT INTO `block_groups` (`id`, `groupname`, `color`) VALUES
(1, 'Orokorra', 'primary');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(200) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `name`) VALUES
(1, 'defektuzkoa');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `fromid` int(200) NOT NULL,
  `toid` int(200) NOT NULL,
  `date` datetime NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat_online`
--

CREATE TABLE `chat_online` (
  `userid` int(200) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int(200) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  `year` int(10) NOT NULL,
  `genre` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `whereis` text NOT NULL,
  `quantity` int(50) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `var` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`var`, `value`, `status`) VALUES
('audioformat', 'mp3', ''),
('audioquality', '128', ''),
('discogs_token', 'discogs_tokena', ''),
('installed', 'RadioCloud web is installed', '0'),
('ldap_status', '0', ''),
('radiodescription', 'Irrati automatizazio sistema', ''),
('radioname', 'RadioCloud', ''),
('twitter1', 'radixuirratia', ''),
('twitter2', 'arrosasarea', ''),
('twitterkey', 'twitterren_api_key_kodea', ''),
('twittersecret', 'twitterren_api_secret_kodea', ''),
('twittertoken', 'tokenkodea', ''),
('twittertokensecret', 'tokensekretkodea', ''),
('upload_hour', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `console`
--

CREATE TABLE `console` (
  `id` int(200) NOT NULL,
  `userid` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dirs`
--

CREATE TABLE `dirs` (
  `id` int(100) NOT NULL,
  `dirname` varchar(100) NOT NULL,
  `dirpath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dirs`
--

INSERT INTO `dirs` (`id`, `dirname`, `dirpath`) VALUES
(1, 'podcast_upload', 'tmp_podcast'),
(2, 'podcast_download', ''),
(3, 'radiocore_dir', '/home/aritz/radiocore/media'),
(4, 'podcast_repeat', ''),
(5, 'radiocloud_dir', '/var/www/radiocloud'),
(6, 'arrosa_xmlrpc', 'http://www.arrosasarea.eus/xmlrpc.php'),
(7, 'external_upload', 'http://10.0.0.155/uploader.php?token=XX'),
(8, 'repeat_dir', '/home/aritz/radiocore/media/'),
(9, 'ad_ldap', 'ldaps://ldapserver'),
(10, 'ad_domain', 'RADIXU'),
(11, 'collection_thumbs', 'collection_thumbs'),
(12, 'console_upload', 'audio/');

-- --------------------------------------------------------

--
-- Table structure for table `instances`
--

CREATE TABLE `instances` (
  `id` int(200) NOT NULL,
  `calendar_id` int(200) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instances`
--

INSERT INTO `instances` (`id`, `calendar_id`, `name`) VALUES
(1, 1, 'RadioCloud irratia');

-- --------------------------------------------------------

--
-- Table structure for table `jingles`
--

CREATE TABLE `jingles` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `filetype` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `probability` int(50) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(100) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `date`, `type`, `data`) VALUES
(16, '2018-09-17 16:02:00', 'info', 'Ongi etorri RadioCloud automatizazio-sistemara.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(200) NOT NULL,
  `seen` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  `agent` text NOT NULL,
  `token` varchar(100) NOT NULL,
  `hash` text NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--



-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(100) NOT NULL,
  `module` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `module`, `name`, `link`, `icon`) VALUES
(1, 1, 'Egutegia', 'egutegia', 'calendar'),
(2, 1, 'Blokeak', 'blokeak', 'folder-open-o'),
(4, 1, 'Kanpoko podcastak', 'podcast', 'tasks'),
(6, 2, 'Irratsaioak', 'irratsaioak', 'cube'),
(7, 2, 'Igo', 'igotzeak', 'upload'),
(8, 3, 'Zuzeneko irratsaioa', 'live', 'wifi'),
(9, 2, 'Urruneko emisioa', 'emisioa', 'paper-plane'),
(10, 3, 'Konfigurazioa', 'config', 'wrench'),
(11, 6, 'Berria', 'berria', 'plus-square'),
(12, 6, 'Bilduma', 'bilduma', 'music'),
(13, 1, 'Matrizea', 'matrix', 'plug'),
(14, 3, 'Emisio-konsola', 'console', 'terminal'),
(15, 3, 'Stream konfigurazioa', 'stream', 'play-circle'),
(16, 1, 'Kuñak', 'jingles', 'music');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `loader` varchar(100) NOT NULL,
  `enabled` int(2) NOT NULL DEFAULT '1',
  `show` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `loader`, `enabled`, `show`) VALUES
(1, 'RadioCore', 'loader.php', 1, 1),
(2, 'RadioPodcast', 'loader.php', 1, 1),
(3, 'RadioLive', 'loader.php', 1, 1),
(4, 'Configuration', 'loader.php', 1, 0),
(5, 'Profile', 'loader.php', 1, 0),
(6, 'RadioCollection', 'loader.php', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `by` int(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `text`, `by`, `date`) VALUES
(1, 'Ongi etorri!', 'Ongi etorri RadioCloud automatizazio-sistemara.', 1, '2018-09-26 11:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `player_log`
--

CREATE TABLE `player_log` (
  `id` int(100) NOT NULL,
  `date` datetime NOT NULL,
  `info` varchar(200) NOT NULL,
  `blockid` int(200) NOT NULL,
  `instanceid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `podcast_download`
--

CREATE TABLE `podcast_download` (
  `id` int(100) NOT NULL,
  `url` text NOT NULL,
  `dday` int(11) NOT NULL,
  `dhour` varchar(100) NOT NULL,
  `blockid` varchar(100) NOT NULL,
  `download_all` tinyint(1) NOT NULL,
  `last_file` varchar(50) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `podcast_upload`
--

CREATE TABLE `podcast_upload` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `title` varchar(100) DEFAULT '',
  `text` text,
  `date` date DEFAULT NULL,
  `add_repeat` tinyint(1) DEFAULT '0',
  `add_podcast` tinyint(1) DEFAULT '0',
  `add_arrosa` tinyint(1) DEFAULT '0',
  `load_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `tmpname` varchar(100) NOT NULL,
  `uploaded` tinyint(1) NOT NULL DEFAULT '0',
  `uploaded_date` datetime DEFAULT NULL,
  `repeat_added` tinyint(1) NOT NULL DEFAULT '0',
  `is_trash` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_day` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `duration` int(100) NOT NULL,
  `arrosa_user` varchar(100) NOT NULL,
  `arrosa_pass` varchar(100) NOT NULL,
  `arrosa_category` varchar(100) NOT NULL,
  `live_allowed` tinyint(1) NOT NULL,
  `blockid` int(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `hour` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `intday` int(11) NOT NULL,
  `calendar_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `signals`
--

CREATE TABLE `signals` (
  `id` int(100) NOT NULL,
  `status` int(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `instance_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signals`
--

INSERT INTO `signals` (`id`, `status`, `info`, `instance_id`) VALUES
(1, 0, 'Live Stream', 0);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `port` varchar(5) NOT NULL,
  `type` varchar(15) NOT NULL,
  `vars` varchar(200) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `streams`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `programid` int(100) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL,
  `identserver` enum('internal','external','','') NOT NULL DEFAULT 'internal',
  `image` varchar(100) NOT NULL DEFAULT 'img/default.png',
  `level` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `desc`, `programid`, `enabled`, `identserver`, `image`, `level`) VALUES
(-1, 'default_priv_user', '007', 'Default user', 'Default user', 0, 0, 'internal', 'img/default.png', 0),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administratzailea', 'Sistemako administratzailea', 0, 1, 'internal', 'img/default.png', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD UNIQUE KEY `access_user_2` (`access_user`,`access_module`),
  ADD KEY `access_user` (`access_user`,`access_module`);

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`userid`,`menuid`);

--
-- Indexes for table `active_repeats`
--
ALTER TABLE `active_repeats`
  ADD PRIMARY KEY (`progid`);

--
-- Indexes for table `audio_library`
--
ALTER TABLE `audio_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `block_groups`
--
ALTER TABLE `block_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_online`
--
ALTER TABLE `chat_online`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`var`),
  ADD UNIQUE KEY `var` (`var`);

--
-- Indexes for table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dirs`
--
ALTER TABLE `dirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instances`
--
ALTER TABLE `instances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jingles`
--
ALTER TABLE `jingles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`token`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module` (`module`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_log`
--
ALTER TABLE `player_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast_download`
--
ALTER TABLE `podcast_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcast_upload`
--
ALTER TABLE `podcast_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signals`
--
ALTER TABLE `signals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio_library`
--
ALTER TABLE `audio_library`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `block_groups`
--
ALTER TABLE `block_groups`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `console`
--
ALTER TABLE `console`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dirs`
--
ALTER TABLE `dirs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `instances`
--
ALTER TABLE `instances`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jingles`
--
ALTER TABLE `jingles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `player_log`
--
ALTER TABLE `player_log`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `podcast_download`
--
ALTER TABLE `podcast_download`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `podcast_upload`
--
ALTER TABLE `podcast_upload`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `signals`
--
ALTER TABLE `signals`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_online`
--
ALTER TABLE `chat_online`
  ADD CONSTRAINT `chat_online_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
