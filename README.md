 📌 CodeNode · Semana 1 · Formulario PHP

Descripción

En esta práctica se pedía crear una página HTML válida y semántica con un formulario que procesara la información mediante PHP y mostrara un mensaje de respuesta.

Para hacerlo más realista he decidido no crear el típico formulario de registro o contacto, sino un formulario de solicitud de presupuesto para una wedding planner, ya que es un caso más cercano a lo que suelen pedir las empresas.

El formulario está hecho en un único archivo index.php, recoge los datos mediante POST, los procesa en el servidor y muestra un mensaje de éxito o error en la misma página.

🧠 Objetivo de aprendizaje

Durante esta semana me he centrado en entender los fundamentos de PHP, no solo en que el formulario funcione.

He trabajado el flujo completo:

Recoger datos con $_POST

Limpiar valores con trim()

Validar campos obligatorios

Validar el formato del email con filter_var()

Mostrar un mensaje dinámico según el resultado

Mantener los datos escritos en los inputs tras el envío

También he aprendido qué significa sanitizar y he añadido una función con htmlspecialchars() para evitar la inyección de código malicioso.

🧱 Estructura

HTML semántico (header, main, section, footer)

Formulario organizado en una card

Mensajes de estado (éxito / error)

Persistencia de datos en los campos

codenode-semana1/
├── index.php
├── assets/
│   ├── nubesrosas.png
│   ├── image.png
│   └── image2.png
└── README.md

🎨 El CSS ha sido construido con apoyo de IA para crear una interfaz más cuidada.
🧩 El código PHP sí está escrito y comprendido por mí.

➕ Mejoras añadidas

✔ Validación de campos obligatorios en servidor
✔ Diferenciación visual entre mensajes de error y éxito
✔ Persistencia de datos tras el envío
✔ Diseño orientado a un caso real de negocio


🖼️ Capturas 

Captura del formulario funcionando

![Formulario de presupuesto](assets/image.png)

Captura del mensaje de validación

![Formulario de presupuesto](assets/image2.png)

✍️ Comentarios personales

En esta práctica he trabajado la sintaxis básica de PHP y el flujo completo de un formulario.
He aprendido a recoger datos con GET y POST, validar campos obligatorios, comprobar el formato del email y usar trim() para eliminar espacios que podrían provocar errores.

También he entendido la importancia de sanitizar la salida con htmlspecialchars() para evitar la inyección de código malicioso.

Ahora comprendo mejor cómo funciona la comunicación cliente-servidor en un caso real y cómo controlar los datos antes de mostrarlos o utilizarlos.

🚀 Posibles mejoras futuras

Envío real del formulario por email

Guardado en base de datos

Separación del CSS en archivo externo

Mejorar tipografia general

👩‍💻 Jesica Serrano
CodeNode · 2026