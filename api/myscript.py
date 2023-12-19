import pandas as pd

def get_ratings(cantidad=5):  # Añade un parámetro para la cantidad de datos a mostrar
    # Cargar el archivo CSV
    ratings = pd.read_csv('MovieLens-100K_Recommender-System/data/ratings.csv')
    return ratings.head(cantidad).to_dict(orient='records')
