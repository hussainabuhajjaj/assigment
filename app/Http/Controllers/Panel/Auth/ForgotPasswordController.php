<?php

namespace App\Http\Controllers\Panel\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $validator = $this->validateEmail($request);

        if ($validator->fails()) {
            return response()->json([
                'msg' => $validator->errors()->first()
            ], 422);
        }

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }


    protected function validateEmail(Request $request)
    {
        $niceNames = [
            'email' => 'البريد الإلكتروني',
        ];
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:admins,email'
        ]);
        $validator->setAttributeNames($niceNames);
        return $validator;

    }

    protected function credentials(Request $request)
    {
        return $request->only('email');
    }


    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'msg' => trans($response)
        ] , 200);
    }


    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json([
            'msg' => trans($response)
        ] , 500);

//        return back()
//            ->withInput($request->only('email'))
//            ->withErrors(['email' => trans($response)]);
    }


    public function broker()
    {
        return Password::broker('admins');
    }
}
