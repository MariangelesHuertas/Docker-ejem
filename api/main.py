from flask import Flask, jsonify, request  # Importa 'request' para manejar parámetros en la solicitud
from myscript import get_ratings

app = Flask(__name__)

@app.route("/api/ratings")
def get_ratings_api():
    # Obtén el parámetro 'cantidad' de la solicitud (si existe, de lo contrario, usa el valor predeterminado 5)
    cantidad = int(request.args.get('cantidad', 5))
    ratings_data = get_ratings(cantidad)
    return jsonify(ratings_data)

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
