import flask
from . import database_controller
from . import routes
from . import CONFIG


def create_app():
    app = flask.Flask(__name__)

    app.config["SQLALCHEMY_DATABASE_URI"] = "postgresql://postgres@localhost:2723"
    app.config["SECRET_KEY"] = CONFIG.secret_key

    database_controller.db.init_app(app)
    database_controller.migrate.init_app(app, database_controller.db)

    app.register_blueprint(routes.app)

    return app
