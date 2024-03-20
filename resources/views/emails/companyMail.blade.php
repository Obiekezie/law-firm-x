
<!doctype html>
<html lang="en-US">


<style>
 @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");
    a:hover {text-decoration: underline !important;}

    body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #1e1e2d;
        }
        
        h1 {
            font-size: 20px;
            font-weight: 400;
            margin: 0;
        }
        
        p {
            margin: 10px 0;
        }
        
        /* Red underline style */
        .red-underline {
            display: inline-block;
            vertical-align: middle;
            margin: 10px 0;
            border-bottom: 1px solid red;
            width: 100px;
        }
     body,
    td,
    p,
    h1,
    h2,
    th {
      font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
    }
    *{
        font-family: "Nunito Sans", Helvetica, Arial, sans-serif !important;
    }
</style>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        >
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <!-- Logo -->
                    <tr>
                        <td style="text-align:center;">
                          <a href="{{config('constants.options.company_url')}}" title="logo" target="_blank">
                            {{config('constants.options.company_name')}}
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:700px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                 

                        @if($request->type =='Register')
                                <tr>
                                    <td style="padding:0 5px; text-align:left;">
   <h1>Hi {{$request->firstName}}</h1>
                        <p> Welcome to {{config('constants.options.company_name')}}! We are thrilled to have you aboard and can't wait to see how our legal services will empower your journey.

Our goal is to ensure that you have everything you need to make the most of {{config('constants.options.company_name')}}.</p>
                        <p>Thank you.  </p>             <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid red; 
                                        width:100px;"></span>
                                    </td>
                                </tr>
                                <!-- Details Table -->
                    
                                <tr>
                                
                                         @endif()    
                                        
                        @if($request->type =='Profile-Image-Reminder')
                                <tr>
                                    <td style="padding:0 5px; text-align:left;">
                                        <h1>Hi,</h1>
                                        <p>Welcome to {{ config('constants.options.company_name') }}!</p>
                                        <p>We noticed that you haven't uploaded your profile picture yet. Having a profile picture helps us better serve you. Please take a moment to update your profile image.</p>
                                        <p>Thank you.</p>
                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid red; width:100px;"></span>
                                    </td>
                                    
                                </tr>
                                <!-- Details Table -->
                    
                                <tr>
                                
                                         @endif()    
                                        
                                        
                                                  <td colspan="2" style="padding-top:5px">
                        <p style="font-size:14px">If you have any questions or need further assistance, please do not hesitate to contact us. Our customer service representatives are available 24/7 to assist you.</p>
                        <p style="font-size:14px">Thank you for choosing  {{config('constants.options.company_name')}}. We look forward to serving you.</p>
                        <p style="font-size:14px">Best regards,</p>
                        <p style="font-size:14px">The  {{config('constants.options.company_name')}} Team</p>
                                                  </td>
                                                </tr>
                                                <tr>
                        <td style="text-align:center;">
                                <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">&copy; <strong>{{config('constants.options.company_url')}}</strong></p>
                        </td>
                    </tr>

                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
              
                </table>
            </td>
        </tr>
    </table>
</body>

</html>