#!/bin/bash

# php -S 0.0.0.0:80
gunicorn --reload --timeout 450 --bind 0.0.0.0:8000 app:app