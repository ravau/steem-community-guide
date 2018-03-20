# steem-community-guide
Site for local community based on Steem blockchain, useful for exploring tags, statistics and users information.

## INTRODUCTION
- First beta version of web application helping exploring tags on Steem blog platform.
- This version is only dedicated to #polish tag structure, it will be more customizable in future releases.

## LIVE BETA
Working beta for #polish Steem community here: http://steem.swhost.pl/

## HOW TO
- use config.php to set connection to chosen Sbds Steem mysql database
- make /data/tags directories for cache
- set cron every 1 hour to file cron.php to fetch data automatically into cache
- /img/profile.png is your local community logo
- set analytics in analytics.php
- [future] set your local community base tags (now only hard coded #polish,#pl-,#reakcja,#tematygodnia)
