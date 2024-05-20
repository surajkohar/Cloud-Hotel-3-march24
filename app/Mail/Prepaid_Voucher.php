<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Attachment;

class Prepaid_Voucher extends Mailable
{
    use Queueable, SerializesModels;
    public $voucherDetails;
    public $pdfData;
    public $attachmentFilename;
    public function __construct($mailPayload,$pdfData,$attachmentFilename)
    {
        $this->voucherDetails=$mailPayload;
        $this->pdfData = $pdfData;
        $this->attachmentFilename = $attachmentFilename;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Prepaid Voucher',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.preparedVoucher',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [ Attachment::fromData(fn () => $this->pdfData, $this->attachmentFilename)
            ->withMime('application/pdf'),];
    }
}
