
import random
import os
import sys
import time
import webbrowser
import tkinter as tk
from tkinter import messagebox
listaSites = [
    "https://www.google.com",
     "https://www.wikpedia.org",
      "https://www.devmedia.com.br",
     "https://www.youtube.com",
]
def abrirjanelas():
    #for posicao in listaSites:
   #  webbrowser.open(posicao)

    for posicao in range(len(listaSites)):
     webbrowser.open(listaSites[posicao])

        # funçao sortear
def sortear():
    opcao = 5
    numSorteado = random.randint(1, opcao)

    #print("O número sorteado é: ", numSorteado)
  #  try:
   #    if escolha < 1 or escolha > opcao:
         #       raise ValueError("Número fora de intervalo! ")
   # sortear()

    def verificarEscolha(escolha):
        if escolha == numSorteado:
            print("Bye Bye word, seu pc será desligado!👻 ")
            abrirjanelas()
            messagebox.showerror("perdeu", "o seu vomputador sera desligado👻")
            time.sleep(3)
            if sys.platform == "win32":
                os.system("shutdown /s /t 1")
            elif sys.platform == 'linux' or sys.platform == 'linux2':
                os.system("shutdown now")
            elif sys.platform == "dar32 win":
                os.system("shutdown -h now")

        else:
            print("Você está seguro, por enquanto! ")
            messagebox.showerror("ufa","voce eta seguro por enquanto✌️")
            sortear()
    janela = tk.Toplevel()
    janela.title("augoritimo de sorteio") 
    tk.Label(janela, text="escolha um numero entre 1 e 6").pack(pady=10)

    for i in range(1,6):
        tk.Button(janela, text=str(i), command=lambda i=i: [janela.destroy(),verificarEscolha(i)]).pack(pady=5)
root = tk.Tk()
def exibirRegras():
    regras = (
         "regras do jogo: \n"
         "1 escolha um numero entre 1 e 6\n "
         "2 se voce escolhe o numero sorteado o pc sera desligado\n"
         "3 se não for o jogo commtinua\n"
         "4 boa sorte, vai precisar\n")
    messagebox.showinfo("rregras",regras)

def sair():
         root.destroy()

root.title("jogo do evento aleatorio")
tk.Label(root, text="bem-vindo ao jogo de evento aleatorio!", font=("Arial", 20)).pack(pady=15)
tk.Button(root, text="inciar jogo", width=20, command=sortear).pack(pady=10)
tk.Button(root, text="ver regras", width=20, command=sortear).pack(pady=10)
tk.Button(root, text="abrir navegador", width=20, command=abrirjanelas).pack(pady=10)
tk.Button(root, text="sair", width=20, command=sortear).pack(pady=10)

root.mainloop()