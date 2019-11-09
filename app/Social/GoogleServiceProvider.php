<?php

namespace App\Social;
use App\User;

class GoogleServiceProvider extends AbstractServiceProvider
{
   /**
     *  Handle Facebook response
     * 
     *  @return Illuminate\Http\Response
     */
    public function handle()
    {
        $userinfo = $this->provider->user();
        $user['name'] = $userinfo->getName();
        $user['email'] = $userinfo->getEmail();
        $user['id'] = $userinfo->getId();

        $existingUser = User::where('email', $user['email'])->first();

        if ($existingUser) {
            $settings = $existingUser['settings'];
            if (! isset($settings['google_id'])) {
                $settings['google_id'] = $user['id'];
                $existingUser->settings = $settings;
                $existingUser->save();
            }
            return $this->login($existingUser);
        }

        $newUser = $this->register([
            'name' => $user['name'],
            'email' =>$user['email'],
            'settings' => [
                'google_id' => $user['id'],                
            ]
        ]);        

        return $this->login($newUser);
    }       
}