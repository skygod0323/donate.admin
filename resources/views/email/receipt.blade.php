<!DOCTYPE html>
<html>

<head>
    <title>Al-Ansar Donate</title>
</head>


<body>

    <div style="background-color: #ffffff; border: 2px solid #f1f3f4; min-width: 900px; max-width: 900px;">
        <div style="text-align: center; padding: 20px 0px;">
            <img src="{{env('APP_URL') . '/storage/' . 'logo.png'}}">
        </div>
        <div style="background-color: black; color: white; text-align: center; padding: 30px 0px;">
            <h1 style="font-size: 40px;">Thank you for donating to Al-Ansar</h1>
        </div>
        <div>
            <div style="padding: 30px 20px;">
                <div style="font-size: 25px; color: #636363;">
                    <p>Assalamu' alaikum wa rahmatullahi wa barakatuh <span style="background-color: yellow;">{{$donation['first_name']}} {{$collection['last_name']}},</span></p>
                    <p>We have finished processing your donation.</p>
                    <p>Thank you for your generous donation. We pray Allah swt accepts your kind generosity. Your donations will help repay the outstanding Qardh Hasan and allow completion of the centre with the remaining finishing touches as well as allowing
                        us to focus on delivering more and better community services and activities in the future insha'Allah.</p>
                    <p>
                        If you are only making a Single Donation at this time, please do consider setting up a Monthly donation of any amount to assist with the cost of running the centre. This can be done online <a href="https://donatetoday.masjidansar.com/donate">here</a>
                    </p>
                </div>

                <div style="margin-top: 40px;">
                    <span style="font-size: 30px; background-color: yellow; font-weight: bold;">[Donation #{{$donation['id']}}] (14th April 2022)</span>
                </div>

                <div style="margin-top: 20px;">
                    <table style="font-size: 30px; color: #636363; width: 100%; border: 1px solid #f1f3f4;">
                        <tbody>
                            <tr style="font-weight: bold;">
                                <td style="width: 40%; padding: 20px; border: 1px solid #f1f3f4;">Donation</td>
                                <td style="width: 25%; padding: 20px; border: 1px solid #f1f3f4;">Quantity</td>
                                <td style="width: 35%; padding: 20px; border: 1px solid #f1f3f4;">Amount</td>
                            </tr>
                            <tr>
                                <td style="padding: 20px; border: 1px solid #f1f3f4;">
                                    <span style="background-color: yellow;">Single Donation</span>
                                </td>
                                <td style="padding: 20px; border: 1px solid #f1f3f4;">1</td>
                                <td style="padding: 20px; border: 1px solid #f1f3f4;">
                                    <span style="background-color: yellow;"> £{{$donation['amount']}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-weight: bold; border: 1px solid #f1f3f4; padding: 20px;">Pyament Method:</td>
                                <td style="border: 1px solid #f1f3f4; padding: 20px;">
                                    <span style="background-color: yellow;">Credit/Debit Card</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-weight: bold; border: 1px solid #f1f3f4; padding: 20px;">Total:</td>
                                <td style="border: 1px solid #f1f3f4; padding: 20px;">
                                    <span style="background-color: yellow;"> £{{$donation['amount']}}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 40px;">
                    <span style="font-size: 30px; font-weight: bold;">Gift Aid</span>
                </div>

                <div style="margin-top: 20px;">
                    <span style="font-size: 30px; background-color: yellow; color: #636363;">
                        <b>Gift Aid Reclaimed? </b> 
                        @if ($donation['gift_add'])
                        Yes
                        @else
                        No
                        @endif
                    </span>
                </div>

                <div style="margin-top: 40px; font-size: 25px; color: #636363;">
                    <p>Jazak'Allah Khair for your support</p>
                </div>


                <div style="margin-top: 50px; padding: 30px 0px; text-align: center;">
                    <div style="display: inline-block; padding-right: 30px;">
                        <a href="https://www.facebook.com/MasjidAnsarUK"><img src="" height="50px"></a>
                    </div>

                    <div style="display: inline-block; padding-right: 30px;">
                        <a href=""><img src="" height="50px"></a>
                    </div>

                    <div style="display: inline-block; padding-right: 30px;">
                        <a href=""><img src="" height="50px"></a>
                    </div>

                    <div style="display: inline-block; padding-right: 30px;">
                        <a href=""><img src="" height="50px"></a>
                    </div>

                    <div style="display: inline-block; padding-right: 30px;">
                        <a href=""><img src="" height="50px"></a>
                    </div>
                </div>

                <div style="margin-top: 30px; text-align: center; color: #636363;">
                    <a href="www.masjidansar.com">www.masjidansar.com</a> Registered Charity No. 1086387
                </div>

            </div>
        </div>
</body>

</html>