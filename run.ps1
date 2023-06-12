#!/bin/pwsh
$env:FLASK_ENV="development"
$env:FLASK_APP="word_by_word"

poetry run py -m flask db init
poetry run py -m flask db migrate
poetry run py -m flask db upgrade

poetry run py -m flask run
