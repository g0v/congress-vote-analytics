#!/bin/bash
git checkout master
git config remote.heroku.url "git@heroku.com:congress-vote-analytics.git"
git push heroku master