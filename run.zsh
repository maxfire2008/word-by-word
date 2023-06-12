#!/bin/zsh
export FLASK_ENV="development"
export FLASK_APP="word_by_word"

poetry run python3 -m flask db init
poetry run python3 -m flask db migrate
poetry run python3 -m flask db upgrade

poetry run python3 -m flask run
