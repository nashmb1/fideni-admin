#!/bin/sh
set -e

# Apache gets grumpy about PID files pre-existing

exec apache2ctl -DFOREGROUND