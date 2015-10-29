#!/bin/sh 
sudo indexer testdelta --rotate >> /var/www/log.txt
sudo service sphinxsearch restart
sudo indexer --merge test1 testdelta --rotate >> /var/www/log.txt
