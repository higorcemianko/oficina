<?php

namespace oficina\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use oficina\Ordem;
use oficina\Veiculo;
use oficina\Cliente;

class OrdemServico extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $ordem;
    public $veiculo;
    public $cliente;
    public function __construct(Ordem $ordem)
    {
        //
        $this->ordem = $ordem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $this->veiculo = Veiculo::find($this->ordem->id_veiculo);
        $this->cliente = Cliente::find($this->veiculo->proprietario);
        return $this->view('email.ordem')
                    ->with(['ordem' => $this->ordem, 
                            'veiculo' => $this->veiculo,
                            'cliente' => $this->cliente,]);
    }
}
