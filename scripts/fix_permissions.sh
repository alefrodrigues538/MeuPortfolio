#!/bin/bash

# Caminho para o diretório que precisa de permissões ajustadas
SITE_PATH="/var/www/public_html/sites"

# Atribui permissões recursivamente (leitura, escrita e execução) para todos
chmod -R 777 "$SITE_PATH"
