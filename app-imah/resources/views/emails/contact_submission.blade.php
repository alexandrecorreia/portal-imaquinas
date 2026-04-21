<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nova Mensagem de Contato - IMAH</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2 style="color: #00858D;">Nova Mensagem de Contato - IMAH</h2>
    <p>Você recebeu uma nova mensagem através do formulário de contato do site IMAH.</p>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #ddd;">Nome:</td>
            <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $data['name'] }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #ddd;">E-mail:</td>
            <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $data['email'] }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #ddd;">Telefone:</td>
            <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $data['phone'] }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #ddd;">Assunto:</td>
            <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $data['subject'] }}</td>
        </tr>
        <tr>
            <td style="padding: 8px; font-weight: bold; border-bottom: 1px solid #ddd;">Mensagem:</td>
            <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $data['message'] }}</td>
        </tr>
    </table>
    <p style="margin-top: 20px;">Enviado em: {{ now()->format('d/m/Y H:i:s') }}</p>
</body>
</html>