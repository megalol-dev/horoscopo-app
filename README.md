# 🌌 Horóscopo Web – Sesiones y Cookies en PHP

Proyecto web desarrollado en **PHP** cuyo objetivo principal es **practicar el uso de sesiones y cookies**, así como la gestión básica de usuarios y preferencias visuales en una aplicación web.

La aplicación permite a los usuarios registrarse, iniciar sesión y personalizar la apariencia de la web, comprobando de forma práctica cómo funcionan las **sesiones** y las **cookies** en distintos escenarios.

---

## 🎯 Objetivo del proyecto

El objetivo de esta web es entender y aplicar:

- **Sesiones en PHP** para la autenticación de usuarios.
- **Cookies** para guardar preferencias del usuario (tema de color y fondo).
- Persistencia de datos al recargar la página o cerrar el navegador.
- Uso de **PHP como lenguaje principal** para el control de la lógica de la aplicación.

Este proyecto ha sido desarrollado como ejercicio práctico de la asignatura de **Desarrollo Web Servidor**.

---

## 🧑‍💻 Funcionalidades principales

- Registro de usuarios.
- Inicio y cierre de sesión mediante **PHP Sessions**.
- Cambio de **fondo** de la web (guardado en cookies).
- Cambio de **color del tema** (guardado en cookies).
- Visualización de los 12 signos del zodiaco.
- Página individual para cada signo con información detallada.
- Persistencia de preferencias aunque se cierre el navegador.

---

## 🍪 Sesiones y Cookies (explicación práctica)

### Sesiones
Las sesiones se utilizan para identificar al usuario logeado.

**Comportamiento esperado:**
- Si el usuario **cierra solo la pestaña**, la sesión **sigue activa**.
- Si el usuario **cierra completamente el navegador**, la sesión **se pierde** y será necesario volver a iniciar sesión.

Esto demuestra el funcionamiento real de las sesiones en PHP.

### Cookies
Las cookies se utilizan para guardar preferencias visuales:
- Fondo de la web.
- Color del tema.

**Comportamiento esperado:**
- Las preferencias se mantienen al recargar la página.
- Las preferencias se mantienen incluso al cerrar y volver a abrir el navegador.
- Las cookies funcionan tanto si el usuario está logeado como si no.

---

## 🧠 ¿Por qué usar todo en PHP?

En este proyecto se ha decidido usar **PHP como lenguaje principal** porque:

- Permite gestionar sesiones y cookies de forma sencilla y directa.
- Facilita el control del flujo de la aplicación (login, logout, redirecciones).
- Es ideal para aprender conceptos básicos de desarrollo web en servidor.
- Evita dependencias externas (frameworks) para centrarse en los fundamentos.

El uso de PHP puro ayuda a comprender mejor cómo funcionan las aplicaciones web por dentro.

---

## ▶️ Cómo arrancar el proyecto

Dentro del proyecto existe un archivo de texto llamado: LEEME Open Web.txt


En ese archivo se explican los pasos necesarios para iniciar la aplicación en entorno local.

Resumen rápido:
1. Abrir una terminal en la carpeta del proyecto.
2. Iniciar el servidor integrado de PHP.
3. Acceder a la web desde el navegador.

---

## 📌 Notas finales

Este proyecto tiene un enfoque **didáctico**, no comercial.
Ha servido para consolidar conceptos clave como:
- Sesiones
- Cookies
- PHP
- Estructura básica de una aplicación web


