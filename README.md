# Nexa Ia

Versão estática em um único arquivo: `index.html`.

## Como usar

1. Sirva a pasta via `http://localhost` ou `https`.
2. Abra a página no navegador.
3. Informe sua chave da OpenRouter quando a página pedir.
4. Envie mensagens no chat.

## Servir localmente

Se quiser testar sem Node, use:

```bash
py -m http.server 8000
```

Depois abra `http://localhost:8000`.

## Observação

A interface mostra apenas o chat na tela.
Se você marcar para salvar a chave, ela fica guardada no navegador.
O modo PWA depende de `http://localhost` ou `https`; `file://` não permite service worker.
