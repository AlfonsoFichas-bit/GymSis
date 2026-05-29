# Configuración POP, IMAP y SMTP para Outlook.com - Soporte técnico de Microsoft
Configuración POP, IMAP y SMTP para Outlook.com

Si está intentando agregar su cuenta de Outlook.com a Outlook u otra aplicación de correo, es posible que necesite la configuración POP, IMAP o SMTP. Puede encontrarlas a continuación o viéndolos en la [configuración de Outlook.com](https://go.microsoft.com/fwlink/p/?linkid=858201).

Outlook y Outlook.com pueden detectar automáticamente la configuración del buzón de la cuenta, pero para otras cuentas que no sean de Microsoft, es posible que deba ponerse en contacto con su proveedor de correo electrónico para conocer su configuración.

Si desea agregar su cuenta de Outlook.com a otro programa de correo electrónico que admita POP o IMAP, esta es la configuración del servidor manual que necesita.

**Notas:** 

*   Pop & acceso IMAP está deshabilitado de forma predeterminada. Consulte la sección siguiente sobre cómo habilitar el acceso de POP o IMAP en Outlook.com.
    
*   Outlook.com requiere el uso de autenticación moderna u OAuth2.
    
*   Los servidores de entrada y salida son los mismos.
    



*                                       Nombre de usuario                                  :                                       Contraseña                                  
  *                   Tu dirección de correo electrónico                :                   La contraseña de tu cuenta de Microsoft.Si no se reconoce tu contraseña o si quieres agregar tu cuenta de Outlook.com a un dispositivo inteligente, como una cámara de seguridad doméstica, es posible que necesites una contraseña de aplicación. Obtenga información sobre cómo agregar su cuenta de Outlook.com a otra aplicación de correo o dispositivo inteligente.                
*                                       Nombre de usuario                                  :                                   
  *                   Tu dirección de correo electrónico                :                                   
*                                       Nombre de usuario                                  :                                       Servidor IMAP                                  
  *                   Tu dirección de correo electrónico                :                   outlook.office365.com                
*                                       Nombre de usuario                                  :                                       Puerto IMAP                                  
  *                   Tu dirección de correo electrónico                :                   993                
*                                       Nombre de usuario                                  :                                       Cifrado IMAP                                  
  *                   Tu dirección de correo electrónico                :                   SSL/TLS                
*                                       Nombre de usuario                                  :                                       Método de autenticación                                  
  *                   Tu dirección de correo electrónico                :                   OAuth2/Modern Auth                
*                                       Nombre de usuario                                  :                                   
  *                   Tu dirección de correo electrónico                :                                   
*                                       Nombre de usuario                                  :                                       Nombre del servidor POP                                  
  *                   Tu dirección de correo electrónico                :                   outlook.office365.com                
*                                       Nombre de usuario                                  :                                       Puerto POP                                  
  *                   Tu dirección de correo electrónico                :                   995                
*                                       Nombre de usuario                                  :                                       Cifrado POP                                  
  *                   Tu dirección de correo electrónico                :                   SSL/TLS                
*                                       Nombre de usuario                                  :                                       Método de autenticación                                  
  *                   Tu dirección de correo electrónico                :                   OAuth2/Modern Auth                
*                                       Nombre de usuario                                  : 
  *                   Tu dirección de correo electrónico                : 
*                                       Nombre de usuario                                  :                                       Nombre del servidor SMTP                                  
  *                   Tu dirección de correo electrónico                :                   smtp-mail.outlook.com                
*                                       Nombre de usuario                                  :                                       Puerto SMTP                                  
  *                   Tu dirección de correo electrónico                :                   587                
*                                       Nombre de usuario                                  :                                       Cifrado SMTP                                  
  *                   Tu dirección de correo electrónico                :                   STARTTLS                
*                                       Nombre de usuario                                  :                                       Método de autenticación                                  
  *                   Tu dirección de correo electrónico                :                   OAuth2/Modern Auth                


Si desea usar POP o IMAP para obtener acceso al correo electrónico en Outlook.com, primero debe habilitar el acceso.

1.  Seleccione **Configuración**  > Reenvío de **correo** > [e IMAP](https://go.microsoft.com/fwlink/?linkid=875424).
    
2.  En **POP e IMAP**, cambie el control deslizante para **Permitir que los dispositivos y aplicaciones usen POP** o **Permitir que los dispositivos y aplicaciones usen IMAP** a **ACTIVADO** , según la cuenta que esté habilitando.
    
3.  Selecciona **Guardar**.
    

Puede recibir un error de conexión si ha configurado su cuenta de Outlook.com como IMAP en varios clientes de correo electrónico. Estamos trabajando en una corrección y actualizaremos este artículo cuando tengamos más información. Por ahora, intente lo siguiente:

1.  Vaya a [account.live.com/activity](https://go.microsoft.com/fwlink/p/?linkid=842341) e inicie sesión con la dirección de correo electrónico y la contraseña de la cuenta afectada.
    
2.  En **Actividad reciente**, busque el evento **Tipo de sesión** que coincida con la hora más reciente en que recibió el error de conexión y haga clic para expandirlo.
    
3.  Seleccione **Se trata de mí** para que el sistema sepa que autoriza la conexión de IMAP.
    
4.  Intente conectarse a la cuenta a través de su cliente IMAP.
    
    Para obtener más información sobre cómo usar la página de actividades recientes, vaya a [¿Qué es la página de actividades recientes?](https://go.microsoft.com/fwlink/p/?linkid=842344)
    

Si usa Outlook.com para acceder a una cuenta que sea diferente a @live.com, @hotmail.com o @outlook.com, es posible que no pueda sincronizar las cuentas mediante IMAP. Para resolver este problema, quite la cuenta IMAP conectada a Outlook.com y vuelva a configurarla como conexión POP. Para obtener instrucciones sobre cómo volver a configurar su cuenta para usar POP, póngase en contacto con el proveedor de su cuenta de correo electrónico.

Si usa una cuenta de GoDaddy, [siga estas instrucciones para volver a configurar su cuenta de GoDaddy para usar POP](https://go.microsoft.com/fwlink/p/?linkid=842345). Si usar POP no resuelve el problema o debe tener habilitado IMAP (está deshabilitado de forma predeterminada), póngase en contacto con el [soporte técnico de GoDaddy](https://go.microsoft.com/fwlink/p/?linkid=842345).

Vea también
-----------

[Agregar sus otras cuentas de correo electrónico a Outlook.com](https://support.microsoft.com/es-es/topic/c5224df4-5885-4e79-91ba-523aa743f0ba)

[Agregar una cuenta de correo electrónico en Outlook](https://support.microsoft.com/es-es/office/agregar-una-cuenta-de-correo-electr%C3%B3nico-a-outlook-para-windows-6e27792a-9267-4aa4-8bb6-c84ef146101b)

[¿Qué son IMAP y POP?](https://support.microsoft.com/es-es/office/-qu%C3%A9-son-imap-y-pop-ca2c5799-49f9-4079-aefe-ddca85d5b1c9)

¿Aún necesita ayuda?
--------------------



*                   :                   
  *           Para obtener soporte técnico en Outlook.com, pulse o haga clic aquí o seleccione Ayuda en la barra de menús y escriba la consulta. Si la autoayuda no resuelve el problema, desplácese hacia abajo hasta ¿Necesita más ayuda? y seleccione Sí.          Si los pasos anteriores no funcionan o no puede iniciar sesión, pulse o haga clic aquí.         :           Para obtener más ayuda con sus suscripciones y su cuenta de Microsoft, visite Ayuda con la cuenta y la facturación.        
*                   :                   
  *           Para obtener soporte técnico en Outlook.com, pulse o haga clic aquí o seleccione Ayuda en la barra de menús y escriba la consulta. Si la autoayuda no resuelve el problema, desplácese hacia abajo hasta ¿Necesita más ayuda? y seleccione Sí.          Si los pasos anteriores no funcionan o no puede iniciar sesión, pulse o haga clic aquí.         :           Para obtener ayuda y solucionar problemas de otros productos y servicios de Microsoft, escriba su problema aquí.         
*                   :                   
  *           Para obtener soporte técnico en Outlook.com, pulse o haga clic aquí o seleccione Ayuda en la barra de menús y escriba la consulta. Si la autoayuda no resuelve el problema, desplácese hacia abajo hasta ¿Necesita más ayuda? y seleccione Sí.          Si los pasos anteriores no funcionan o no puede iniciar sesión, pulse o haga clic aquí.         :           Publique preguntas, siga debates y comparta sus conocimientos en la comunidad de Outlook.com.        


### ¿Necesita más ayuda?

### ¿Quiere más opciones?

Explore las ventajas de las suscripciones, examine los cursos de aprendizaje, aprenda a proteger su dispositivo y mucho más.
