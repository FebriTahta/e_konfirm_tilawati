<?php

namespace App\Jobs;
use App\Models\Peserta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BroadcastWA implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $value;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $curl = curl_init();
        $token = "ETDoFxrQu746dzPyu4V2PxH1LxW7GuYdV2fyxGtIoklIaOz3E0ymAvbSZqeamfRa";
        $payload = [
            "data" => [
                [
                    'phone' => $this->value->telp,
                    'message' => 'Berkaitan dengan acara yang akan diselenggarakan.
                    
                    *HANYA UNTUK USTADZ / USTADZAH CALON PESERTA YANG BELUM BERGABUNG KEDALAM GROUP WA*
                    kami harapkan dapat bergabung pada link group berikut. 
                                
                    *LINK : '.$this->value->pelatihan->groupwa.'* 
                                
                    *simpan nomor ini untuk mengaktifkan link group diatas*
                    group tersebut adalah group kedua khusus untuk peserta yang belum bergabung di group pertama (group penuh)',
                    'secret' => false, // or true
                    'retry' => false, // or true
                    'isGroup' => false, // or true
                ]
            ]
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
                "Content-Type: application/json"
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload) );
        curl_setopt($curl, CURLOPT_URL, "https://solo.wablas.com/api/v2/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
    }
}
