import flask

index = flask.Blueprint("index", __name__)


@index.route("/")
def index_route():
    return flask.render_template("index.html")
