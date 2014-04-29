#!/bin/bash
git checkout dev
git config remote.heroku.url "git@heroku.com:dev-congress-vote-analytics.git"
git push heroku master