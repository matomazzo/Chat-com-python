from flask import Flask as fl, render_template
from flask_socketio import SocketIO, send

app = fl(__name__)
app.config["DEBUG"] = True #para fins de teste

# permite que usuários, de qualquer lugar se comunique
socketio = SocketIO(app, cors_allowed_origins='*')

#enviar a mensagem
@socketio.on('message') #evento do socket
#quando esse evento dispara, ele executa a função abaixo    
def msgManual(msg):
    print(f'Mensagem: {msg}')
    send(msg, broadcast=True) #Envia a mensagem apra todos conectados no site em tempo de execução
    
# pip install python-socketio flask-socketio simple-websocket
# Criando a primeira rota

@app.route("/") #Crio a rota
def homepage():
    return render_template("index.html") #carrega a página principal estipulada por mim

# roda o app

if __name__ == "__main__":
    # socketio.run(app, host="localhost") #defino que ele rodará localmente
    socketio.run(app, host="127.0.0.1") #defino que ele rodará em um IP, servidor por exemplo

# webscoket
