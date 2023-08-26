## Webhook

Este é um projeto de Laravel Framework 7.30, onde recebe e envia dados por meio de Webhook.

## Receber Webhook / IPN

> Receber Webhook
* Use sua url **http://seu-site.com/webhook** para receber os dados da IPN ou WH.

## Enviar Webhook para destino

> Toda vez que seu webhook receber algum POST, será re-enviado para o destino.
* Dentro do controlador **WebhookController** poderá editar o destino do Webhook na variavel **$url**.
