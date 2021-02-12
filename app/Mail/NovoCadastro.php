<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoCadastro extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $email;
    public $telefone;
    public $endereco;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome, $email, $telefone, $endereco)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.novo-cadastro');
    }
}
