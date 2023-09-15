import flask

app = flask.Blueprint("app", __name__)


@app.route("/")
def index_route():
    user_id = None
    if flask.request.cookies.get("token"):
        user_id = flask.request.cookies.get("token")
    return flask.render_template("index.html", user_id=user_id)


@app.route("/submit_word", methods=["POST"])
def submit_word():
    next_word = flask.request.form.get("next_word")
    user_id = flask.request.cookies.get("token")
    if not user_id:
        return "Not logged in", 403


@app.route("/set_user_id")
def set_user_id():
    user_id = flask.request.args.get("user_id")
    resp = flask.make_response(flask.redirect("/"))
    resp.set_cookie("token", user_id)
    return resp
