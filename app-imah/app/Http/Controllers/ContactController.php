<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Verifica o honeypot
        if (!empty($request->website)) {
            // Se o campo website foi preenchido, é um bot
            return redirect()->back()->with('success', 'Mensagem enviada com sucesso!')->withInput();
        }

        // Validação dos campos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Dados pra enviar no e-mail
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? 'Não informado',
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ];

        // Envia o e-mail
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormSubmission($data));

        // Redireciona com mensagem de sucesso
        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
    }
}