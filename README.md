# Proyecto

Es un proyecto que sera ejecutado en docker para mostrar todas las vulnerabilidades y que no se ejecute codigo mal intencionado en la pagina


## Vulnerabilidades en el proyecto

### Top OWASP 10

Vulnerabilidades que se piensan tratar en la web

- Inyecciones
    - SQL
        consultas parametrizadas php
    - noSQL
    - LDAP
    - XPath
    - Command OS
- Perdida de Autenticacion
    - Ataques de Fuerza Bruta
    - Contrasenas por defectol, como un diccionario conocido (proceso en db)
    - Almacenar las contrasenas en texto claro
    - Ausencia de autenticacion multifactor
- Exposicion de Datos Sensibles
    - uso de http,smtp,ftp
    - Algoritmos debiles o antiguos
- Entidades Externas XML (XXE)
- Perdida de Control de Acceso
    - 
- Configuracion de Seguridad Incorrecta
- Secucencia de Comandos de Sitios Cruzados (XSS)
    - XSS Reflejado
    - XSS Almacenado 
    - XSS basado en DOM
- Deserializacion Insegura
- Componentes de vulnerabilidades Conocidas
- Registro y Monitoreo Insuficientes


## Referencias

- https://github.com/OWASP/Top10/blob/master/2017/es/
- https://cheatsheetseries.owasp.org/
- https://github.com/swisskyrepo/PayloadsAllTheThings/blob/master/Insecure%20Deserialization/PHP.md


Dada la gran popularidad de Visual Studio Code , no os sorprenderá ver que hay una extensión en el marketplace oficial de VS Code dedicada a compartir código: Polacode, la polaroid para tu código.

## Subir archivos

```bash
git add .
git commit -m "La lala"
git push -u origin main
```