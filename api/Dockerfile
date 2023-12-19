# Usa la imagen oficial de Python 3
FROM python:3

# Establece el directorio de trabajo en /app
WORKDIR /app

# Copia todo el contenido del directorio del proyecto al contenedor
COPY . /app

# Instala las dependencias necesarias
RUN pip install -r requirements.txt

# Cambia los permisos de los scripts
RUN chmod a+x myscript.py
RUN chmod a+x main.py

# Exponer el puerto 5000 para Flask
EXPOSE 5000

# Ejecuta el script principal cuando el contenedor se inicia
CMD ["python", "./main.py"]
