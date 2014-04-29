#!/bin/bash
git config remote.heroku.url "git@heroku.com:dev-congress-vote-analytics.git"
git push -f heroku dev:master