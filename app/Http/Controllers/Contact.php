<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Categori;
use App\Berita;
use Alert;
use App\Vidios;

class Contact extends Controller
{
    function showContactForm(){
        $Categori = Categori::all();
        $categori = Categori::all();
        $berita2 = Berita::orderBy('created_at','asc')->take(5)->get();
        return view('frontend.contact')->with(compact('Categori','categori','berita2'));
    }

    function sendMail(Request $request){
        $this->validate($request, [
                                    'name'=>'required',
                                    'email'=>'required|email',
                                    'message'=>'required',
                                    'model'=>'required'
                                             ]);
        
        $subject = "Contact dari " . $request->input('nama');
        $name = $request->input('name');
        $emailAddress = $request->input('email');
        $message = $request->input('message');
        $model = $request->input('model');

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
        // Pengaturan Server
        // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.mailgun.org';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'postmaster@sandbox94f28571fd2f4d27874b7051322204dc.mailgun.org';       
        // SMTP username
            $mail->Password = 'b03449288e5009f1abf9f019f3dffc79';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            // Siapa yang mengirim email
            $mail->setFrom($emailAddress, $name);

            // Siapa yang akan menerima email
            $mail->addAddress('ichwanarif26@gmail.com', 'iChwan');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional

            // ke siapa akan kita balas emailnya
            $mail->addReplyTo($emailAddress, $name);
            
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "Nama      : ".$name.
            "<br> E-mail                : ".$emailAddress.
            "<br> Subject               : ".$model.
            "<br> Pesan & Saran         : ".$message;

            $mail->AltBody = $message ;
 

            $mail->send();


            $Categori = Categori::all();
            $categori = Categori::all();
            $berita0 = Berita::orderBy('created_at','asc')->take(1)->get();
            $berita1 = Berita::orderBy('created_at','desc')->take(3)->get();
            $berita2 = Berita::orderBy('created_at','asc')->take(5)->get();
            $beritas = Berita::orderBy('created_at','desc')->paginate(5);
            $vidios  = Vidios::orderBy('created_at','desc')->take(6)->get();
            $berita  = Berita::all();
             $populer =  Berita::orderBy('views','desc')->take(5)->get();
            $request->session()->flash('status', 'Terima kasih, kami sudah menerima email anda.');
            alert()->success('Pesan Berhasil Terkirim gan','Sipp :)')->persistent('Close');
            return view('frontend.index')->with(compact('Categori','categori','berita0','berita2','berita1','vidios','beritas','berita','populer'));

        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

    }
}