<?php

namespace App\Social;

use App\User;

class FacebookServiceProvider extends AbstractServiceProvider
{
   /**
     *  Handle Facebook response
     * 
     *  @return Illuminate\Http\Response
     */
    public function handle()
    {
        // $user = $this->provider->user();

        // echo "<pre>";
        // print_r($user);
        // die;

        $user = $this->provider->fields([
                    'name', 
                    'email', 
                    'id',                  
                ])->user();
            
        $u_email = $user->email;
        $u_name = $user->name;
        // echo "email :".$u_email;
        // die;
                
        if($u_email == ''){
            return redirect('/')->with('alert', 'Please remove xtacky app from your facebook Settings - Apps and Websites.\n Dont disable Email Id at the time of registeration otherwise try different way.');
        }            

        //$existingUser = User::where('settings->facebook_id', $user->id)->first();

        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            $settings = $existingUser->settings;

            if (! isset($settings['facebook_id'])) {
                $settings['facebook_id'] = $user->id;
                $existingUser->settings = $settings;
                $existingUser->save();
            }

            return $this->login($existingUser);
        }

        $newUser = $this->register([
            'name' => $user->user['name'],
            'email' => $user->email,
            'settings' => [
                'facebook_id' => $user->id,                
            ]
        ]);        
         // echo "<pre>";
         // print_r($newUser);
         // die;
        return $this->login($newUser);
    }       
}