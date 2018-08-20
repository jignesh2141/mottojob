<!DOCTYPE html>
<html>
<head>
<title>{{ $user['name'] }} applied for $job['title'] on MottoJob.</title>
</head>
<body>
<h2>Hi {{$job['corporate_name']}},</h2>
<br/>
Details of {{ $user['name'] }}.
<br/><br/>

<table>

  <tr>
    <td>Name</td>
    <td>{{ $user['name'] }}</td>
  </tr>

  <tr>
    <td>Email</td>
    <td>{{ $user['email'] }}</td>
  </tr>

  <tr>
    <td>First Name</td>
    <td>{{ $user['first_name'] }} {{ $user['first_name_hiragana'] }}</td>
  </tr>

  <tr>
    <td>Last Name</td>
    <td>{{ $user['last_name'] }} {{ $user['last_name_hiragana'] }}</td>
  </tr>

  <tr>
    <td>Phone number</td>
    <td>{{ $user['phone_number'] }}</td>
  </tr>

  <tr>
    <td>Date Of Birth</td>
    <td>{{ $user['birth_month'] }} {{ $user['birth_date'] }} {{ $user['birth_year'] }}</td>
  </tr>

  <tr>
    <td>Nationality</td>
    <td>{{ $user['nationality'] }}</td>
  </tr>

  <tr>
    <td>Gender</td>
    <td>{{ $user['gender'] }}</td>
  </tr>

  <tr>
    <td>Living In Japan</td>
    <td>{{ $user['living_in_japan'] }}</td>
  </tr>

  <tr>
    <td>Prefecture</td>
    <td>{{ $user['prefecture'] }}</td>
  </tr>

  <tr>
    <td>Visa</td>
    <td>{{ $user['visa'] }}</td>
  </tr>


</table>

<br><br>
Regards,<br>
<b>MottoJob</b>

</body>
</html>
