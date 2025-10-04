<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'nombre'   => ['required','string','max:80'],
            'apellido' => ['nullable','string','max:80'],
            'email'    => ['required','email'],
            'mensaje'  => ['required','string','max:2000'],
        ]);

        // 1) Guardar en BD
        $contact = Contact::create([
            'nombre'     => $data['nombre'],
            'apellido'   => $data['apellido'] ?? null,
            'email'      => $data['email'],
            'mensaje'    => $data['mensaje'],
            'ip'         => $request->ip(),
            'user_agent' => substr($request->userAgent() ?? '', 0, 255),
        ]);

        // 2) Enviar correo a admin
        try {
            $destinatario = config('mail.from.address', 'info@casadelasjoyas.com');
            Mail::raw(
                "Nuevo contacto #{$contact->id}\n\n".
                "Nombre: {$contact->nombre} {$contact->apellido}\n".
                "Email: {$contact->email}\n\n".
                "Mensaje:\n{$contact->mensaje}\n",
                function ($message) use ($destinatario) {
                    $message->to($destinatario)
                            ->subject('Mensaje de contacto - La Casa de las Joyas');
                }
            );
        } catch (\Throwable $e) {
            report($e); // no cortar flujo si falla el mail
        }

        // 3) Autorespuesta al usuario
        try {
            Mail::send([], [], function ($message) use ($contact) {
                $message->to($contact->email)
                        ->subject('Gracias por contactarnos – La Casa de las Joyas')
                        ->setBody(
                            view('emails.contact-autorespuesta', ['contact' => $contact])->render(),
                            'text/html'
                        );
            });
        } catch (\Throwable $e) {
            report($e); // opcional
        }

        return back()->with('ok', '¡Gracias! Hemos recibido tu mensaje y te responderemos pronto.');
    }
}
