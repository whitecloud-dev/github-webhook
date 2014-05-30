<?php

#
# MAIN configuration file
#

# Cache and project configs folders
define('__CACHE_DIR__',		__DIR__.'/sync-cache');
define('__SYNC_CONFIGS_DIR__',	__DIR__.'/sync-configs');

# Log file
define('LOG_FILENAME',		'git-sync.log');

# Clone and Sync git commands
define('__CMD_CLONE__',		'git clone $repo_url $cache_dir');
define('__CMD_SYNC__',		'cd $cache_dir && git pull');
define('__CMD_CHECKOUT__',     'cd $cache_dir && git checkout $branch');

# Protocol-specific configurations
$proto_conf = array(
	'rsync+ssh' => array(
		'exec' => 'rsync -avz --exclude \'.git*\' $from $user@$host:$path$repo_path/ 2>&1',
	),
	'ftp' => array(
		'exec' => 'ncftpput -F -D -R -u $user -p $password $host $srv_path/ $from/* 2>&1',
	)
);