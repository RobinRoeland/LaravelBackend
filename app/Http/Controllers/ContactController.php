<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request) {
        return view('main.contact');
      }
      // Store Contact Form data
      public function storeForm(Request $request) {
          // Form validation
          $this->validate($request, [
              'name' => 'required',
              'email' => 'required|email',
              'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
              'subject'=>'required',
              'message' => 'required'
           ]);
          //  Store data in database
          Contact::create($request->all());
          //
          /* sturen email werkt niet zonder geldige email account + instellingen in .env
            MAIL_MAILER=smtp
            MAIL_HOST=mailpit
            MAIL_PORT=1025
            MAIL_USERNAME=null
            MAIL_PASSWORD=null
            MAIL_ENCRYPTION=null
            MAIL_FROM_ADDRESS="hello@example.com"
            MAIL_FROM_NAME="${APP_NAME}"
          */
          //  Send mail to admin
/*          \Mail::send('main.mail', array(
              'name' => $request->get('name'),
              'email' => $request->get('email'),
              'phone' => $request->get('phone'),
              'subject' => $request->get('subject'),
              'user_query' => $request->get('message'),
          ), function($message) use ($request){
              $message->from($request->email);
              $message->to('admin@ehb.be', 'Admin')->subject($request->get('subject'));
          });
*/

          return back()->with('success', 'Thank you for contacting us. We have received your message.');
      }
}
