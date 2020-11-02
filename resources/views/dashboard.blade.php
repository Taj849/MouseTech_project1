<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        .profile{
            margin:100px auto;
            width: 600px;
            background-color: rgb(105, 230, 105);
        }
        
        .profile table{
            margin: 100px auto;
            padding: 10px;
            
        }
        .profile tr td{
            padding: 10px;
            width: 30%;
            background-color: aliceblue;
            border: 2px black solid;
        }
    </style>
</head>
<body>
    <div class="profile">
        <div class="tablet">
           <a href="{{url('logout')}}"><button style="padding: 10px;float: right;">Logout</button></a> 
            @foreach ($data as $item)
            <h2 style="text-align: center;color:white;margin-top:10px;">{{$item->fname}}  {{$item->lname}} Profile</h2>
            
            <table>
               
                <tr>
                    <td>
                        First Name
                    </td>
                    <td>
                        {{$item->fname}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Last Name
                    </td>
                    <td>
                        {{$item->lname}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Name of organization
                    </td>
                    <td>
                        {{$item->organization}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Street
                    </td>
                    <td>
                        {{$item->street}}
                    </td>
                </tr>
                <tr>
                    <td>
                        City
                    </td>
                    <td>
                        {{$item->city}}
                    </td>
                </tr>
                <tr>
                    <td>
                        eMail
                    </td>
                    <td>
                        {{$item->email}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Mobile Number
                    </td>
                    <td>
                        {{$item->phone_number}}
                    </td>
                </tr>
               
                
            </table>
            @endforeach
        </div>
        
    </div>
</body>
</html>