<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Consts\Prefectures;

class OpinionSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $name;
    private $kana;
    private $age;
    private $prefecture;
    private $municipalities;
    private $address;
    private $building;
    private $tel;
    private $opinion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($postData)
    {
        $this->email = $postData['email'];
        $this->name = $postData['name'];
        $this->kana = $postData['kana'];
        $this->age = $postData['age'];
        $this->prefecture = Prefectures::PREF_LIST[$postData['prefecture']];
        $this->municipalities = $postData['municipalities'];
        $this->address = $postData['address'];
        $this->building = $postData['building'];
        $this->tel = $postData['tel'];
        $this->opinion = $postData['opinion'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
        ->subject('【andi】ご意見ご要望を承りました。')
        ->view('opinion.mail')
        ->with([
            'name' => $this->name,
            'kana' => $this->kana,
            'age' => $this->age,
            'prefecture' => $this->prefecture,
            'municipalities' => $this->municipalities,
            'address' => $this->address,
            'building' => $this->building,
            'tel' => $this->tel,
            'opinion' => $this->opinion,
        ]);
    }
}
