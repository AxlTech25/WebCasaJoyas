<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
</head>
<body style="font-family:Arial,sans-serif; color:#333;">
  <h2 style="color:#173A5E;">Gracias por contactarnos</h2>
  <p>Hola {{ $contact->nombre }},</p>
  <p>
    Hemos recibido tu mensaje y nuestro equipo de <strong>La Casa de las Joyas</strong>
    te responderá lo antes posible.
  </p>
  <p>
    <em>Resumen de tu consulta:</em><br>
    {{ $contact->mensaje }}
  </p>
  <p style="margin-top:20px;">
    Mientras tanto, puedes visitar nuestra web: 
    <a href="{{ url('/') }}" style="color:#173A5E;">La Casa de las Joyas</a>
  </p>
  <p style="margin-top:30px; font-size:12px; color:#777;">
    Este es un correo automático, por favor no respondas a este mensaje.
  </p>
</body>
</html>
