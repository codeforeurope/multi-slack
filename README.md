# multi-slack
Slack team to team communication

## For Code for Europe
Currently I am hosting OVER HTTP at http://slackbots.jgroenen.nl

### To-do
Move to (for example) https://www.multi-slack.com/codeforeurope-a961e65b9dcbbb01915cc05954c03991ec8a93da
1. Create domain
2. Install SSL
3. Implement multi-channel

## Setup
1. Copy channels.dist.php to channels.php
2. Host it at <multi-slack_url>

## Usage
1. Create a channel for your Slack team
2. Create an incoming webhook for that channel (to receive broadcast messages) and add url to channels.php
3. Create an outgoing webhook for that channel to <multi-slack_url> (to send broadcast messages) and add token to channels.php
