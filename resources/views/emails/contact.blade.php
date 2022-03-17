@component('mail::message')
    # Novo Contato
    Contato: {{ $name }} - {{ $email }}
    Assunto: {{ $subject }}
    Mensagem:
    {{ $message }}
    * Esse e-mail é enviado automaticamente através do sistema!
@endcomponent
