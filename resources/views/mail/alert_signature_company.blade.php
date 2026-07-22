@use('Carbon\Carbon')
@use('App\Models\Account')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fim de assinaturas</title>
</head>
<body>
    @foreach ($signatures as $signature)
        @if (Carbon::today()->diffInDays($signature->end_date) <= 5)
            <p>
                Restam {{ Carbon::today()->diffInDays($signature->end_date) }} dias 
                para a assinatura de {{ Account::find($signature->account_id)->name }} expirar.
            </p>
        @endif
    @endforeach
</body>
</html>