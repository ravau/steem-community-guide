# Steem Community Guide
Site for local community based on Steem blockchain, useful for exploring tags, statistics and users information.

## INTRODUCTION
- First beta version of web application helping exploring tags on Steem blog platform.
- It helps managing tags with **Hierarchical Tag Tree**, **Tag Cloud**, curated tags listing, users listing.
- This version is only dedicated to #polish tag structure, it will be more customizable in future releases.

## LIVE BETA
Working beta for #polish Steem community here: 
> http://steem.swhost.pl/ - **Polish Steem Community Guide**
- http://steem.swhost.pl/tags - tag cloud & pl-% (specific polish tags)
- http://steem.swhost.pl/categories - tag tree graph
- http://steem.swhost.pl/users - users activity

## HOW TO
- use config.php to set connection to chosen Sbds Steem mysql database
- your hosting should allow outcoming mysql connections
- make /data/tags directories for cache
- set cron every few hours to file cron.php to fetch data automatically into cache
- /img/profile.png is your local community logo
- set analytics in analytics.php
- [future] set your local community base tags (now only hard coded #polish,#pl-,#reakcja,#tematygodnia)